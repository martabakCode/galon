<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('storage/' . config('global.icon')) }}">
    <!-- <link rel="icon" type ="image/png" href="{{ asset('storage/' . config('global.icon')) }}"> -->
    <title>{{ config('global.name_' . App::getLocale(), 'Galonmart') }}</title>
    <meta name="description" content="{{ config('global.description_' . App::getLocale(), 'eCommerce') }}">
    <meta name="keywords" content="{{ config('global.keywords_' . App::getLocale(), 'eCommerce') }}">
    <meta name="author" content="Galonmart ">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper822_swiper-bundle.min.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>

</head>
@if (config('global.layout') === 'basic')
    <x-layouts.guest-header />
@elseif (config('global.layout') === 'modern')
    <x-layouts2.guest-header />
@elseif (config('global.layout') === 'lite')
    <x-layouts3.guest-header />
@endif

<body class="font-droid bg-gray-50 text-gray-900 antialiased">
    <audio src="{{ asset('storage/bgm.mp3') }}" autoplay loop hidden></audio>
    {{ $slot }}

    @stack('modals')
    @livewireScripts
</body>
<x-layouts.guest-footer />

</html>
