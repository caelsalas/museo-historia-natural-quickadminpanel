<?php

namespace App\Http\Livewire\EventType;

use App\Models\EventType;
use Livewire\Component;

class Edit extends Component
{
    public EventType $eventType;

    public function mount(EventType $eventType)
    {
        $this->eventType = $eventType;
    }

    public function render()
    {
        return view('livewire.event-type.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->eventType->save();

        return redirect()->route('admin.event-types.index');
    }

    protected function rules(): array
    {
        return [
            'eventType.name' => [
                'string',
                'required',
            ],
        ];
    }
}
