@props(['url'])

<a href="{{ $url }}" class="btn btn-icon" data-bs-toggle="tooltip" title="{{ __('Edit') }}"
    data-bs-placement="bottom" {{ $attributes }}>
    <i class="ti ti-edit text-primary"></i>
</a>
