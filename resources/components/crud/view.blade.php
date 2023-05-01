@props(['url'])

<a href="{{ $url }}" class="btn btn-icon" data-bs-toggle="tooltip" title="{{ __('View') }}"
    data-bs-placement="bottom" {{ $attributes }}>
    <i class="ti ti-eye"></i>
</a>
