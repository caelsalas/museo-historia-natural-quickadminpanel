<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('subscription_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Subscription" format="csv" />
                <livewire:excel-export model="Subscription" format="xlsx" />
                <livewire:excel-export model="Subscription" format="pdf" />
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
                            {{ trans('cruds.subscription.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.subscription.fields.email') }}
                            @include('components.table.sort', ['field' => 'email'])
                        </th>
                        <th>
                            {{ trans('cruds.subscription.fields.created_at') }}
                            @include('components.table.sort', ['field' => 'created_at'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subscriptions as $subscription)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $subscription->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $subscription->id }}
                            </td>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $subscription->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $subscription->email }}
                                </a>
                            </td>
                            <td>
                                {{ $subscription->created_at }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('subscription_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.subscriptions.show', $subscription) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('subscription_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.subscriptions.edit', $subscription) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('subscription_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $subscription->id }})" wire:loading.attr="disabled">
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
            {{ $subscriptions->links() }}
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