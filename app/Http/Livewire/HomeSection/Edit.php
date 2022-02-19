<?php

namespace App\Http\Livewire\HomeSection;

use App\Models\HomeSection;
use Livewire\Component;

class Edit extends Component
{
    public HomeSection $homeSection;

    public function mount(HomeSection $homeSection)
    {
        $this->homeSection = $homeSection;
    }

    public function render()
    {
        return view('livewire.home-section.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->homeSection->save();

        return redirect()->route('admin.home-sections.index');
    }

    protected function rules(): array
    {
        return [
            'homeSection.meta_title' => [
                'string',
                'nullable',
            ],
            'homeSection.meta_title_en' => [
                'string',
                'nullable',
            ],
            'homeSection.meta_description' => [
                'string',
                'nullable',
            ],
            'homeSection.meta_description_en' => [
                'string',
                'nullable',
            ],
            'homeSection.info_schedule' => [
                'string',
                'nullable',
            ],
            'homeSection.info_schedule_en' => [
                'string',
                'nullable',
            ],
            'homeSection.info_address' => [
                'string',
                'nullable',
            ],
            'homeSection.info_address_en' => [
                'string',
                'nullable',
            ],
            'homeSection.info_tickets' => [
                'string',
                'nullable',
            ],
            'homeSection.info_tickets_en' => [
                'string',
                'nullable',
            ],
        ];
    }
}
