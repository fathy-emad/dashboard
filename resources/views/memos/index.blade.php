<x-layouts::dashboard :title="__('My Memos')">
    <x-components::status />

    <div class="card">
        <div class="card-header justify-content-between">
            <p class="card-title">{{ __('My Memos') }}</p>
            <a href="{{ route('memos.create') }}" class="btn btn-primary">{{ __('Create Memo') }}</a>
        </div>

        <div class="card-table table-responsive">
            <table class="table table-vcenter">
                <thead>
                    <tr>
                        <th>{{ __('Title') }}</th>
                        <th style="width: 1%"></th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($memos as $memo)
                        <tr>
                            <td>{{ $memo->title }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <x-components::crud.view :url="route('memos.show', $memo)" />
                                    <x-components::crud.edit :url="route('memos.edit', $memo)" />
                                    <x-components::crud.delete :url="route('memos.destroy', $memo)" />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center py-5">{{ __('No memos found.') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer pb-0">
            {{ $memos->links() }}
        </div>
    </div>
</x-layouts::dashboard>
