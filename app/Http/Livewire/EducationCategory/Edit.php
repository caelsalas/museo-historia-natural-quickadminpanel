<?php

namespace App\Http\Livewire\EducationCategory;

use App\Models\EducationCategory;
use Livewire\Component;

class Edit extends Component
{
    public EducationCategory $educationCategory;

    public function mount(EducationCategory $educationCategory)
    {
        $this->educationCategory = $educationCategory;
    }

    public function render()
    {
        return view('livewire.education-category.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->educationCategory->save();

        return redirect()->route('admin.education-categories.index');
    }

    protected function rules(): array
    {
        return [
            'educationCategory.name' => [
                'string',
                'required',
            ],
            'educationCategory.slug' => [
                'string',
                'required',
                'unique:education_categories,slug,' . $this->educationCategory->id,
            ],
            'educationCategory.published' => [
                'boolean',
            ],
        ];
    }
}
