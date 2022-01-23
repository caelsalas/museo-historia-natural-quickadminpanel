<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
use App\Models\EventAudience;
use App\Models\EventCost;
use App\Models\EventModality;
use App\Models\EventType;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Event $event;

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

    public function mount(Event $event)
    {
        $this->event            = $event;
        $this->event->published = true;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.event.create');
    }

    public function submit()
    {
        $this->validate();

        $this->event->save();
        $this->syncMedia();

        return redirect()->route('admin.events.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->event->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'event.name' => [
                'string',
                'required',
            ],
            'event.slug' => [
                'string',
                'required',
                'unique:events,slug',
            ],
            'event.content' => [
                'string',
                'nullable',
            ],
            'event.date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'mediaCollections.event_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.event_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'event.tickets' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'event.type_id' => [
                'integer',
                'exists:event_types,id',
                'required',
            ],
            'event.audience_id' => [
                'integer',
                'exists:event_audiences,id',
                'required',
            ],
            'event.modality_id' => [
                'integer',
                'exists:event_modalities,id',
                'required',
            ],
            'event.cost_id' => [
                'integer',
                'exists:event_costs,id',
                'required',
            ],
            'event.published' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['type']     = EventType::pluck('name', 'id')->toArray();
        $this->listsForFields['audience'] = EventAudience::pluck('name', 'id')->toArray();
        $this->listsForFields['modality'] = EventModality::pluck('name', 'id')->toArray();
        $this->listsForFields['cost']     = EventCost::pluck('name', 'id')->toArray();
    }
}
