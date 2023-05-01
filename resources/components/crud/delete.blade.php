@props(['url'])

<form action="{{ $url }}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-icon" data-bs-toggle="tooltip" title="{{ __('Delete') }}"
        data-bs-placement="bottom" {{ $attributes }}>
        <i class="ti ti-trash text-danger"></i>
    </button>
</form>
