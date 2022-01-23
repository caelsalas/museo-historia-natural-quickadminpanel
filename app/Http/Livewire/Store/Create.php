<?php

namespace App\Http\Livewire\Store;

use App\Models\Store;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Store $store;

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

    public function mount(Store $store)
    {
        $this->store            = $store;
        $this->store->published = true;
    }

    public function render()
    {
        return view('livewire.store.create');
    }

    public function submit()
    {
        $this->validate();

        $this->store->save();
        $this->syncMedia();

        return redirect()->route('admin.stores.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->store->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'store.name' => [
                'string',
                'required',
            ],
            'store.price' => [
                'numeric',
                'required',
            ],
            'mediaCollections.store_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.store_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'store.published' => [
                'boolean',
            ],
        ];
    }
}
