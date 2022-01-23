<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('information_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Information" format="csv" />
                <livewire:excel-export model="Information" format="xlsx" />
                <livewire:excel-export model="Information" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.information.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.information.fields.schedule') }}
                            @include('components.table.sort', ['field' => 'schedule'])
                        </th>
                        <th>
                            {{ trans('cruds.information.fields.location') }}
                            @include('components.table.sort', ['field' => 'location'])
                        </th>
                        <th>
                            {{ trans('cruds.information.fields.tickets') }}
                            @include('components.table.sort', ['field' => 'tickets'])
                        </th>
                        <th>
                            {{ trans('cruds.information.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.information.fields.created_at') }}
                            @include('components.table.sort', ['field' => 'created_at'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($information as $information)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $information->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $information->id }}
                            </td>
                            <td>
                                {{ $information->schedule }}
                            </td>
                            <td>
                                {{ $information->location }}
                            </td>
                            <td>
                                {{ $information->tickets }}
                            </td>
                            <td>
                                @foreach($information->image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $information->created_at }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('information_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.information.show', $information) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('information_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.information.edit', $information) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('information_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $information->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $information->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush