@props([
    'title' => null,
    'direction' => app()->getLocale() == 'ar' ? 'rtl' : 'ltr',
])

@php
    $title = (isset($title) ? $title . ' | ' : '') . __(config('app.name'));
@endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ $direction }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="title" content="{{ $title }}">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Abdelrhman Said">

    <title>{{ $title }}</title>

    <link rel="icon" href="{{ asset('assets/images/icon.png') }}" type="image/png" />

    {{-- Tabler Core --}}
    <link rel="stylesheet" href="{{ asset("/vendor/tabler/tabler.$direction.min.css") }}">
    <link rel="stylesheet" href="{{ asset('/vendor/tabler/tabler-vendors.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/tabler-icons/tabler-icons.min.css') }}">

    {{-- Custom Styles --}}
    <link rel="stylesheet" href="{{ asset('/assets/css/app.css') }}">

    @stack('styles')
</head>

<body {{ $attributes->merge(['class' => 'antialiased']) }}>
    <script src="{{ asset('/vendor/tabler/tabler-theme.min.js') }}"></script>

    {{ $slot }}

    <x-components::toastify />

    {{-- Jquery --}}
    <script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>

    {{-- Tabler Core --}}
    <script src="{{ asset('/vendor/tabler/tabler.min.js') }}"></script>

    {{-- Tabler Plugins --}}
    <script src="{{ asset('/vendor/tinymce/tinymce.min.js') }}"></script>

    {{-- Custom Scripts --}}
    <script src="{{ asset('/assets/js/app.js') }}"></script>

    @stack('scripts')
</body>

</html>
