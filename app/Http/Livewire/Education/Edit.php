<?php

namespace App\Http\Livewire\Education;

use App\Models\Education;
use App\Models\Tour;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Education $education;

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

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    public function mount(Education $education)
    {
        $this->education = $education;
        $this->initListsForFields();
        $this->mediaCollections = [
            'education_image' => $education->image,
        ];
    }

    public function render()
    {
        return view('livewire.education.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->education->save();
        $this->syncMedia();

        return redirect()->route('admin.education.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->education->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'education.name' => [
                'string',
                'required',
            ],
            'education.content' => [
                'string',
                'nullable',
            ],
            'mediaCollections.education_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.education_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'education.tour_id' => [
                'integer',
                'exists:tours,id',
                'nullable',
            ],
            'education.published' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['tour'] = Tour::pluck('name', 'id')->toArray();
    }
}
