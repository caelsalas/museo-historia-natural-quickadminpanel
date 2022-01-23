<?php

namespace App\Http\Livewire\EventCost;

use App\Models\EventCost;
use Livewire\Component;

class Create extends Component
{
    public EventCost $eventCost;

    public function mount(EventCost $eventCost)
    {
        $this->eventCost = $eventCost;
    }

    public function render()
    {
        return view('livewire.event-cost.create');
    }

    public function submit()
    {
        $this->validate();

        $this->eventCost->save();

        return redirect()->route('admin.event-costs.index');
    }

    protected function rules(): array
    {
        return [
            'eventCost.name' => [
                'string',
                'required',
            ],
        ];
    }
}
