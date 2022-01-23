<?php

namespace App\Http\Livewire\EducationCategory;

use App\Models\EducationCategory;
use Livewire\Component;

class Create extends Component
{
    public EducationCategory $educationCategory;

    public function mount(EducationCategory $educationCategory)
    {
        $this->educationCategory            = $educationCategory;
        $this->educationCategory->published = true;
    }

    public function render()
    {
        return view('livewire.education-category.create');
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
                'unique:education_categories,slug',
            ],
            'educationCategory.published' => [
                'boolean',
            ],
        ];
    }
}
