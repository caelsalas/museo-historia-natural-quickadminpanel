<?php

namespace App\Http\Livewire\Information;

use App\Models\Information;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Information $information;

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

    public function mount(Information $information)
    {
        $this->information = $information;
    }

    public function render()
    {
        return view('livewire.information.create');
    }

    public function submit()
    {
        $this->validate();

        $this->information->save();
        $this->syncMedia();

        return redirect()->route('admin.information.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->information->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'information.schedule' => [
                'string',
                'nullable',
            ],
            'information.location' => [
                'string',
                'nullable',
            ],
            'information.tickets' => [
                'string',
                'nullable',
            ],
            'mediaCollections.information_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.information_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.information_image_en' => [
                'array',
                'nullable',
            ],
            'mediaCollections.information_image_en.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }
}
