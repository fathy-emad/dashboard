@props(['field'])

@error($field)
    <div class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </div>

    @push('scripts')
        <script>
            $(() => $('[name={{ $field }}], #{{ $field }}').addClass('is-invalid'));
        </script>
    @endpush
@enderror
