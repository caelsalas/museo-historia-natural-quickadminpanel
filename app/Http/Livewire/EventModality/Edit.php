<?php

namespace App\Http\Livewire\EventModality;

use App\Models\EventModality;
use Livewire\Component;

class Edit extends Component
{
    public EventModality $eventModality;

    public function mount(EventModality $eventModality)
    {
        $this->eventModality = $eventModality;
    }

    public function render()
    {
        return view('livewire.event-modality.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->eventModality->save();

        return redirect()->route('admin.event-modalities.index');
    }

    protected function rules(): array
    {
        return [
            'eventModality.name' => [
                'string',
                'required',
            ],
        ];
    }
}
