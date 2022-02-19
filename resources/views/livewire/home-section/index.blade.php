<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('home_section_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="HomeSection" format="csv" />
                <livewire:excel-export model="HomeSection" format="xlsx" />
                <livewire:excel-export model="HomeSection" format="pdf" />
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
                            {{ trans('cruds.homeSection.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.homeSection.fields.meta_title') }}
                            @include('components.table.sort', ['field' => 'meta_title'])
                        </th>
                        <th>
                            {{ trans('cruds.homeSection.fields.meta_title_en') }}
                            @include('components.table.sort', ['field' => 'meta_title_en'])
                        </th>
                        <th>
                            {{ trans('cruds.homeSection.fields.meta_description') }}
                            @include('components.table.sort', ['field' => 'meta_description'])
                        </th>
                        <th>
                            {{ trans('cruds.homeSection.fields.meta_description_en') }}
                            @include('components.table.sort', ['field' => 'meta_description_en'])
                        </th>
                        <th>
                            {{ trans('cruds.homeSection.fields.info_schedule') }}
                            @include('components.table.sort', ['field' => 'info_schedule'])
                        </th>
                        <th>
                            {{ trans('cruds.homeSection.fields.info_schedule_en') }}
                            @include('components.table.sort', ['field' => 'info_schedule_en'])
                        </th>
                        <th>
                            {{ trans('cruds.homeSection.fields.info_address') }}
                            @include('components.table.sort', ['field' => 'info_address'])
                        </th>
                        <th>
                            {{ trans('cruds.homeSection.fields.info_address_en') }}
                            @include('components.table.sort', ['field' => 'info_address_en'])
                        </th>
                        <th>
                            {{ trans('cruds.homeSection.fields.info_tickets') }}
                            @include('components.table.sort', ['field' => 'info_tickets'])
                        </th>
                        <th>
                            {{ trans('cruds.homeSection.fields.info_tickets_en') }}
                            @include('components.table.sort', ['field' => 'info_tickets_en'])
                        </th>
                        <th>
                            {{ trans('cruds.homeSection.fields.created_at') }}
                            @include('components.table.sort', ['field' => 'created_at'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($homeSections as $homeSection)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $homeSection->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $homeSection->id }}
                            </td>
                            <td>
                                {{ $homeSection->meta_title }}
                            </td>
                            <td>
                                {{ $homeSection->meta_title_en }}
                            </td>
                            <td>
                                {{ $homeSection->meta_description }}
                            </td>
                            <td>
                                {{ $homeSection->meta_description_en }}
                            </td>
                            <td>
                                {{ $homeSection->info_schedule }}
                            </td>
                            <td>
                                {{ $homeSection->info_schedule_en }}
                            </td>
                            <td>
                                {{ $homeSection->info_address }}
                            </td>
                            <td>
                                {{ $homeSection->info_address_en }}
                            </td>
                            <td>
                                {{ $homeSection->info_tickets }}
                            </td>
                            <td>
                                {{ $homeSection->info_tickets_en }}
                            </td>
                            <td>
                                {{ $homeSection->created_at }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('home_section_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.home-sections.show', $homeSection) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('home_section_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.home-sections.edit', $homeSection) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('home_section_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $homeSection->id }})" wire:loading.attr="disabled">
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
            {{ $homeSections->links() }}
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