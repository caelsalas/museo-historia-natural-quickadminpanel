<?php

namespace App\Http\Livewire\PublicationSpecialty;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\PublicationSpecialty;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new PublicationSpecialty())->orderable;
    }

    public function render()
    {
        $query = PublicationSpecialty::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $publicationSpecialties = $query->paginate($this->perPage);

        return view('livewire.publication-specialty.index', compact('publicationSpecialties', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('publication_specialty_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        PublicationSpecialty::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(PublicationSpecialty $publicationSpecialty)
    {
        abort_if(Gate::denies('publication_specialty_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $publicationSpecialty->delete();
    }
}
