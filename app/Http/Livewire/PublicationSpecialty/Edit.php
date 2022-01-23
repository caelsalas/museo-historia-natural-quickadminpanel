<?php

namespace App\Http\Livewire\PublicationSpecialty;

use App\Models\PublicationSpecialty;
use Livewire\Component;

class Edit extends Component
{
    public PublicationSpecialty $publicationSpecialty;

    public function mount(PublicationSpecialty $publicationSpecialty)
    {
        $this->publicationSpecialty = $publicationSpecialty;
    }

    public function render()
    {
        return view('livewire.publication-specialty.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->publicationSpecialty->save();

        return redirect()->route('admin.publication-specialties.index');
    }

    protected function rules(): array
    {
        return [
            'publicationSpecialty.name' => [
                'string',
                'required',
            ],
        ];
    }
}
