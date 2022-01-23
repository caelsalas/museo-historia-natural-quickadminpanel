<?php

namespace App\Http\Livewire\Publication;

use App\Models\Publication;
use App\Models\PublicationSpecialty;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Publication $publication;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function mount(Publication $publication)
    {
        $this->publication            = $publication;
        $this->publication->published = true;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.publication.create');
    }

    public function submit()
    {
        $this->validate();

        $this->publication->save();
        $this->syncMedia();

        return redirect()->route('admin.publications.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->publication->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'publication.specialty_id' => [
                'integer',
                'exists:publication_specialties,id',
                'required',
            ],
            'publication.name' => [
                'string',
                'required',
            ],
            'publication.author' => [
                'string',
                'nullable',
            ],
            'publication.content' => [
                'string',
                'nullable',
            ],
            'publication.type' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['type'])),
            ],
            'mediaCollections.publication_file' => [
                'array',
                'nullable',
            ],
            'mediaCollections.publication_file.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'publication.link' => [
                'string',
                'nullable',
            ],
            'publication.target' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['target'])),
            ],
            'publication.date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'publication.published' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['specialty'] = PublicationSpecialty::pluck('name', 'id')->toArray();
        $this->listsForFields['type']      = $this->publication::TYPE_SELECT;
        $this->listsForFields['target']    = $this->publication::TARGET_SELECT;
    }
}
