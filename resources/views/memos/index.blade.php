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
                                    <a href="{{ route('memos.show', $memo) }}" class="btn btn-icon">
                                        <i class="ti ti-eye"></i>
                                    </a>

                                    <a href="{{ route('memos.edit', $memo) }}" class="btn btn-icon">
                                        <i class="ti ti-edit"></i>
                                    </a>

                                    <form action="{{ route('memos.destroy', $memo) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-icon">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </form>
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
