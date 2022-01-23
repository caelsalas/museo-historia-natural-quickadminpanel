<?php

namespace App\Http\Livewire\VirtualTour;

use App\Models\VirtualTour;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public VirtualTour $virtualTour;

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

    public function mount(VirtualTour $virtualTour)
    {
        $this->virtualTour      = $virtualTour;
        $this->mediaCollections = [
            'virtual_tour_image' => $virtualTour->image,
        ];
    }

    public function render()
    {
        return view('livewire.virtual-tour.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->virtualTour->save();
        $this->syncMedia();

        return redirect()->route('admin.virtual-tours.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->virtualTour->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'virtualTour.name' => [
                'string',
                'required',
            ],
            'virtualTour.slug' => [
                'string',
                'required',
                'unique:virtual_tours,slug,' . $this->virtualTour->id,
            ],
            'virtualTour.summary' => [
                'string',
                'nullable',
            ],
            'virtualTour.content' => [
                'string',
                'nullable',
            ],
            'mediaCollections.virtual_tour_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.virtual_tour_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'virtualTour.published' => [
                'boolean',
            ],
        ];
    }
}
