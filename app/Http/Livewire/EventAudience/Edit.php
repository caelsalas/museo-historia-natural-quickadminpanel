<?php

namespace App\Http\Livewire\EventAudience;

use App\Models\EventAudience;
use Livewire\Component;

class Edit extends Component
{
    public EventAudience $eventAudience;

    public function mount(EventAudience $eventAudience)
    {
        $this->eventAudience = $eventAudience;
    }

    public function render()
    {
        return view('livewire.event-audience.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->eventAudience->save();

        return redirect()->route('admin.event-audiences.index');
    }

    protected function rules(): array
    {
        return [
            'eventAudience.name' => [
                'string',
                'required',
            ],
        ];
    }
}
