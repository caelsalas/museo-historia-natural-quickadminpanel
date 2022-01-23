<?php

namespace App\Http\Livewire\Header;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Header;
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
        $this->orderable         = (new Header())->orderable;
    }

    public function render()
    {
        $query = Header::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $headers = $query->paginate($this->perPage);

        return view('livewire.header.index', compact('headers', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('header_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Header::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Header $header)
    {
        abort_if(Gate::denies('header_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $header->delete();
    }
}
