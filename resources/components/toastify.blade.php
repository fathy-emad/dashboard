<link rel="stylesheet" href="{{ asset('/vendor/toastify/toastify.min.css') }}">
<script src="{{ asset('/vendor/toastify/toastify.min.js') }}"></script>

<script>
    Toastify.defaults = {
        ...Toastify.defaults,
        gravity: 'bottom',
        position: 'right',
        style: {
            background: 'inherit'
        },
    };

    function toastify() {
        return {
            toast: function(text, options = {}) {
                Toastify({
                    text,
                    className: 'bg-dark',
                    ...options
                }).showToast();
            },
            error: function(text, options = {}) {
                Toastify({
                    text,
                    className: 'bg-danger',
                    ...options
                }).showToast();
            },
            success: function(text, options = {}) {
                Toastify({
                    text,
                    className: 'bg-success',
                    ...options
                }).showToast();
            },
            info: function(text, options = {}) {
                Toastify({
                    text,
                    className: 'bg-info',
                    ...options
                }).showToast();
            },
            warning: function(text, options = {}) {
                Toastify({
                    text,
                    className: 'bg-warning',
                    ...options
                }).showToast();
            },
        };
    }

    @foreach (session('toastify') ?? [] as $toast)
        toastify().{{ $toast['type'] }}('{{ $toast['message'] }}', {!! json_encode($toast['options'] ?? []) !!});
    @endforeach

    {{ session()->forget('toastify') }}
</script>
