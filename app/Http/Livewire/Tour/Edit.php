<?php

namespace App\Http\Livewire\Tour;

use App\Models\Tour;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Tour $tour;

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

    public function mount(Tour $tour)
    {
        $this->tour             = $tour;
        $this->mediaCollections = [
            'tour_image' => $tour->image,
        ];
    }

    public function render()
    {
        return view('livewire.tour.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->tour->save();
        $this->syncMedia();

        return redirect()->route('admin.tours.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->tour->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'tour.name' => [
                'string',
                'required',
            ],
            'tour.slug' => [
                'string',
                'required',
                'unique:tours,slug,' . $this->tour->id,
            ],
            'tour.summary' => [
                'string',
                'nullable',
            ],
            'tour.content' => [
                'string',
                'nullable',
            ],
            'mediaCollections.tour_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.tour_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'tour.published' => [
                'boolean',
            ],
        ];
    }
}
