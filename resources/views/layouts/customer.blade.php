<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('storage/' . config('global.icon')) }}">
    <!-- <link rel="icon" type ="image/png" href="{{ asset('storage/' . config('global.icon')) }}"> -->
    <title>{{ config('global.name_' . App::getLocale(), 'Galon Mart') }}</title>
    <meta name="description" content="{{ config('global.description_' . App::getLocale(), 'eCommerce') }}">
    <meta name="keywords" content="{{ config('global.keywords_' . App::getLocale(), 'eCommerce') }}">
    <meta name="author" content="Galonmart ">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('js/ar.js') }}"></script>
    <script src="{{ asset('js/ckeditor.js') }}"></script>
</head>
<style>
    .ck-editor__editable {
        min-height: 300px;
    }

    [dir="rtl"] select {
        background-position: left 0.5rem center;
    }
</style>

<body class="antialiased font-droid" x-data="{ profileMenu: false, mobileMenu: false, profileMobileMenu: false }">
    <x-layouts.customer-mobile-menu />
    <x-layouts.customer-sidebar />

    <div class="flex flex-col md:rtl:pr-64 md:ltr:pl-64 ">
        <x-layouts.app-main-menu />
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
