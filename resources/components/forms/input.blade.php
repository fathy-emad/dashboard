@props(['name', 'title', 'type' => 'text', 'required' => false])

<label for="{{ $name }}" class="form-label">
    {{ $title }}

    @if ($required)
        <span class="text-danger">*</span>
    @endif
</label>

<input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-control"
    {{ $attributes->merge(['required' => $required]) }}>

<x-components::forms.invalid-feedback :field="$name" />
