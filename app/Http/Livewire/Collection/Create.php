<?php

namespace App\Http\Livewire\Collection;

use App\Models\Collection;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Collection $collection;

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

    public function mount(Collection $collection)
    {
        $this->collection            = $collection;
        $this->collection->published = true;
    }

    public function render()
    {
        return view('livewire.collection.create');
    }

    public function submit()
    {
        $this->validate();

        $this->collection->save();
        $this->syncMedia();

        return redirect()->route('admin.collections.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->collection->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'collection.name' => [
                'string',
                'required',
            ],
            'collection.content' => [
                'string',
                'nullable',
            ],
            'mediaCollections.collection_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.collection_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'collection.published' => [
                'boolean',
            ],
        ];
    }
}
