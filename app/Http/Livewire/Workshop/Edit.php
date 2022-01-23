<?php

namespace App\Http\Livewire\Workshop;

use App\Models\Workshop;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Workshop $workshop;

    public array $mediaToRemove = [];

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

    public function mount(Workshop $workshop)
    {
        $this->workshop         = $workshop;
        $this->mediaCollections = [
            'workshop_image' => $workshop->image,
        ];
    }

    public function render()
    {
        return view('livewire.workshop.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->workshop->save();
        $this->syncMedia();

        return redirect()->route('admin.workshops.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->workshop->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'workshop.name' => [
                'string',
                'required',
            ],
            'workshop.slug' => [
                'string',
                'required',
                'unique:workshops,slug,' . $this->workshop->id,
            ],
            'workshop.summary' => [
                'string',
                'nullable',
            ],
            'workshop.content' => [
                'string',
                'nullable',
            ],
            'mediaCollections.workshop_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.workshop_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'workshop.published' => [
                'boolean',
            ],
        ];
    }
}
