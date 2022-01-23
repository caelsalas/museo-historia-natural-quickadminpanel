<?php

namespace App\Http\Livewire\Header;

use App\Models\Header;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Header $header;

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

    public function mount(Header $header)
    {
        $this->header = $header;
        $this->initListsForFields();
        $this->mediaCollections = [
            'header_image'        => $header->image,
            'header_image_mobile' => $header->image_mobile,
        ];
    }

    public function render()
    {
        return view('livewire.header.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->header->save();
        $this->syncMedia();

        return redirect()->route('admin.headers.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->header->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'header.name' => [
                'string',
                'required',
            ],
            'mediaCollections.header_image' => [
                'array',
                'required',
            ],
            'mediaCollections.header_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.header_image_mobile' => [
                'array',
                'required',
            ],
            'mediaCollections.header_image_mobile.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'header.link' => [
                'string',
                'nullable',
            ],
            'header.target' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['target'])),
            ],
            'header.published' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['target'] = $this->header::TARGET_SELECT;
    }
}
