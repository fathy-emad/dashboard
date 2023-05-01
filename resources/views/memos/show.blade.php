<x-layouts::dashboard :title="__('Read Memo')">
    <div class="card">
        <div class="card-header">
            <p class="card-title">{{ $memo->title }}</p>
        </div>

        <div class="card-body">
            {!! $memo->content !!}
        </div>

        <div class="card-footer text-end">
            <a href="{{ route('memos.index') }}" class="btn">{{ __('Back') }}</a>
        </div>
    </div>
</x-layouts::dashboard>
