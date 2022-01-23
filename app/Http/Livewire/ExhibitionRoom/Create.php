<?php

namespace App\Http\Livewire\ExhibitionRoom;

use App\Models\ExhibitionRoom;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public array $mediaToRemove = [];

    public array $mediaCollections = [];

    public ExhibitionRoom $exhibitionRoom;

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

    public function mount(ExhibitionRoom $exhibitionRoom)
    {
        $this->exhibitionRoom            = $exhibitionRoom;
        $this->exhibitionRoom->published = true;
    }

    public function render()
    {
        return view('livewire.exhibition-room.create');
    }

    public function submit()
    {
        $this->validate();

        $this->exhibitionRoom->save();
        $this->syncMedia();

        return redirect()->route('admin.exhibition-rooms.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->exhibitionRoom->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'exhibitionRoom.name' => [
                'string',
                'required',
            ],
            'exhibitionRoom.description' => [
                'string',
                'required',
            ],
            'mediaCollections.exhibition_room_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.exhibition_room_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.exhibition_room_gallery' => [
                'array',
                'nullable',
            ],
            'mediaCollections.exhibition_room_gallery.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'exhibitionRoom.published' => [
                'boolean',
            ],
        ];
    }
}
