<?php

namespace App\Http\Livewire\ExhibitionRoom;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\ExhibitionRoom;
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
        $this->orderable         = (new ExhibitionRoom())->orderable;
    }

    public function render()
    {
        $query = ExhibitionRoom::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $exhibitionRooms = $query->paginate($this->perPage);

        return view('livewire.exhibition-room.index', compact('exhibitionRooms', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('exhibition_room_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        ExhibitionRoom::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(ExhibitionRoom $exhibitionRoom)
    {
        abort_if(Gate::denies('exhibition_room_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitionRoom->delete();
    }
}
