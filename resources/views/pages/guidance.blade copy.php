<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ App::isLocale('id') ? 'rtl' : 'ltr' }}">

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
    @livewireStyles
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body class="font-droid bg-gray-50 text-gray-900 antialiased">

    <div>
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <div class="relative z-40 md:hidden" role="dialog" aria-modal="true">
            <!--
      Off-canvas menu backdrop, show/hide based on off-canvas menu state.

      Entering: "transition-opacity ease-linear duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "transition-opacity ease-linear duration-300"
        From: "opacity-100"
        To: "opacity-0"
    -->
            <div class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>

            <div class="fixed inset-0 z-40 flex">
                <!--
        Off-canvas menu, show/hide based on off-canvas menu state.

        Entering: "transition ease-in-out duration-300 transform"
          From: "-translate-x-full"
          To: "translate-x-0"
        Leaving: "transition ease-in-out duration-300 transform"
          From: "translate-x-0"
          To: "-translate-x-full"
      -->
                <div class="relative flex w-full max-w-xs flex-1 flex-col bg-gray-800 pt-5 pb-4">
                    <!--
          Close button, show/hide based on off-canvas menu state.

          Entering: "ease-in-out duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in-out duration-300"
            From: "opacity-100"
            To: "opacity-0"
        -->
                    <div class="absolute top-0 right-0 pt-2 ltr:-mr-12 rtl:-ml-12">
                        <button type="button"
                            class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                            <span class="sr-only">Close sidebar</span>
                            <!-- Heroicon name: outline/x-mark -->
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex flex-shrink-0 items-center px-4">
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                            alt="Your Company">
                    </div>
                    <div class="mt-5 h-0 flex-1 overflow-y-auto">
                        <nav class="space-y-1 px-2">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="#"
                                class="group flex items-center rounded-md bg-gray-900 px-2 py-2 text-base font-medium text-white">
                                <!--
                Heroicon name: outline/home

                Current: "text-gray-300", Default: "text-gray-400 group-hover:text-gray-300"
              -->

                                Dashboard
                            </a>

                            <a href="#"
                                class="group flex items-center rounded-md px-2 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
                                <!-- Heroicon name: outline/users -->

                                Team
                            </a>

                            <a href="#"
                                class="group flex items-center rounded-md px-2 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
                                <!-- Heroicon name: outline/folder -->

                                Projects
                            </a>

                            <a href="#"
                                class="group flex items-center rounded-md px-2 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
                                <!-- Heroicon name: outline/calendar -->

                                Calendar
                            </a>

                            <a href="#"
                                class="group flex items-center rounded-md px-2 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
                                <!-- Heroicon name: outline/inbox -->

                                Documents
                            </a>

                            <a href="#"
                                class="group flex items-center rounded-md px-2 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
                                <!-- Heroicon name: outline/chart-bar -->
                                Reports
                            </a>
                        </nav>
                    </div>
                </div>

                <div class="w-14 flex-shrink-0" aria-hidden="true">
                    <!-- Dummy element to force sidebar to shrink to fit close icon -->
                </div>
            </div>
        </div>

        <!-- Static sidebar for desktop -->
        <div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex min-h-0 flex-1 flex-col bg-gray-800">
                <div class="flex h-16 flex-shrink-0 items-center bg-gray-800 px-4">
                    <img class="h-8 w-auto"
                        src="{{ asset('storage/' . config('global.logo_transparent_' . App::getLocale())) }}"
                        alt="{{ config('global.title') }}">
                </div>
                <div class="flex flex-1 flex-col overflow-y-auto" x-data="{ item: 0 }">
                    <nav class="flex-1 space-y-1 px-2 py-4 text-white">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <p class="px-2 py-2 font-bold">Getting started</p>
                        <a href="#requirement" x-on:click="item = 0"
                            :class="item == 0 ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                            class="group ml-2 flex items-center rounded-md py-2 px-2 text-sm font-medium">
                            Requirement
                        </a>
                        <a href="#installation" x-on:click="item = 1"
                            :class="item == 1 ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                            class="group ml-2 flex items-center rounded-md py-2 px-2 text-sm font-medium">
                            Installation
                        </a>
                        <a href="#config" x-on:click="item = 2"
                            :class="item == 2 ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                            class="group text-gray-white ml-2 flex items-center rounded-md py-2 px-2 text-sm font-medium">
                            Configuration
                        </a>
                        {{-- <a href="#localization" x-on:click="item = 3"
                            :class="item == 3 ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                            class="group text-gray-white ml-2 flex items-center rounded-md py-2 px-2 text-sm font-medium">
                            Localization
                        </a> --}}
                        <a href="#support" x-on:click="item = 4"
                            :class="item == 4 ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                            class="group text-gray-white ml-2 flex items-center rounded-md py-2 px-2 text-sm font-medium">
                            Support & bug reports
                        </a>
                        <p class="px-2 py-2 font-bold">Guide</p>
                        <a href="#settings" x-on:click="item = 5"
                            :class="item == 5 ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                            class="group text-gray-white ml-2 flex items-center rounded-md py-2 px-2 text-sm font-medium">
                            Settings
                        </a>
                        <a href="#categories" x-on:click="item = 6"
                            :class="item == 6 ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                            class="group text-gray-white ml-2 flex items-center rounded-md py-2 px-2 text-sm font-medium">
                            Categories
                        </a>
                        <a href="#brands" x-on:click="item = 7"
                            :class="item == 7 ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                            class="group text-gray-white ml-2 flex items-center rounded-md py-2 px-2 text-sm font-medium">
                            Brands
                        </a>
                        <a href="#products" x-on:click="item = 8"
                            :class="item == 8 ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                            class="group text-gray-white ml-2 flex items-center rounded-md py-2 px-2 text-sm font-medium">
                            Products
                        </a>
                        <a href="#pages" x-on:click="item = 9"
                            :class="item == 9 ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                            class="group text-gray-white ml-2 flex items-center rounded-md py-2 px-2 text-sm font-medium">
                            Pages
                        </a>
                        <a href="#blog-cats" x-on:click="item = 10"
                            :class="item == 10 ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                            class="group text-gray-white ml-2 flex items-center rounded-md py-2 px-2 text-sm font-medium">
                            Blog categories
                        </a>
                        <a href="#blog-posts" x-on:click="item = 11"
                            :class="item == 11 ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                            class="group text-gray-white ml-2 flex items-center rounded-md py-2 px-2 text-sm font-medium">
                            Blog posts
                        </a>
                        <a href="#developers" x-on:click="item = 12"
                            :class="item == 12 ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'"
                            class="group text-gray-white ml-2 flex items-center rounded-md py-2 px-2 text-sm font-medium">
                            In progress work
                        </a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="flex flex-col ltr:md:pl-64 rtl:md:pr-64">
            <div class="sticky top-0 z-10 flex h-16 flex-shrink-0 bg-gray-800 shadow">
                <button type="button"
                    class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
                    <span class="sr-only">Open sidebar</span>
                    <!-- Heroicon name: outline/bars-3-bottom-left -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                    </svg>
                </button>
                <div class="flex flex-1 justify-end px-4">
                    <div
                        class="mt-5 mb-4 hidden items-center divide-x divide-gray-400 text-sm font-medium text-gray-200 rtl:divide-x-reverse sm:flex">
                        <a class="{{ app()->getLocale() == 'id' ? 'underline text-white underline-offset-1' : '' }} flex px-1 hover:font-semibold hover:text-yellow-200"
                            href="{{ route('language', 'id') }}">{{ __('id') }}</a>
                        <a class="{{ app()->getLocale() == 'en' ? 'underline text-white underline-offset-1' : '' }} flex px-1 hover:font-semibold hover:text-yellow-200"
                            href="{{ route('language', 'en') }}">{{ __('EN') }}</a>
                    </div>
                </div>
            </div>

            <main class="flex-1 bg-gray-300">
                <div class="py-6">

                    <section class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
                        <!-- Replace with your content -->
                        <div class="py-4">
                            <img src="{{ asset('storage/cartify.png') }}" />
                        </div>
                        <div id="requirement" class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
                            <h1 class="pt-16 pb-4 text-left text-2xl font-semibold text-gray-900">Requirement</h1>
                            <p>Galon Mart is an e-commerce platform built on top of the Laravel framework which has a few
                                system requirements. You should ensure that your web server has the following minimum
                                PHP version and extensions:
                            </p>
                            <ul class="list-disc px-4">
                                <li class="">
                                    PHP 8.1 or later
                                </li>
                                <li class="">
                                    Mysql 8.x or later
                                </li>
                                <li class="">
                                    and the default PHP extensions
                                </li>
                            </ul>
                        </div>
                        <div id="installation" class="mx-auto mt-10 max-w-7xl px-4 sm:px-6 md:px-8">
                            <h1 class="pt-16 pb-4 text-2xl font-semibold text-gray-900">Installation</h1>
                            <ul class="list-disc space-y-2 px-4">
                                <li>
                                    <strong>Download and unzip Galon Mart file</strong>
                                    <p>To get Galon Mart installed on your local machine or VPS, you will need to download
                                        the zip archive from CodeCanyon and extract it to your desired directory.
                                    </p>
                                </li>
                                <li>
                                    <strong>Install composer</strong>
                                    <p>From your application directory run the following command to install all composer
                                        dependencies.
                                    </p>
                                    <div class="flex w-full justify-start">
                                        <code class="w-full rounded-md bg-gray-800 p-2">
                                            <span class="text-sm font-normal italic text-gray-200">
                                                composer install
                                            </span>
                                        </code>
                                    </div>
                                </li>
                                <li>
                                    <strong>Creating environment configuration file</strong>
                                    <p>After the composer installation process is finished you will need to make a copy
                                        of .env.example to .env (this is where our application stores all the
                                        configuration
                                        variables). Prepare your application url.
                                    </p>
                                    <div class="flex w-full justify-start">
                                        <code class="w-full rounded-md bg-gray-800 p-2">
                                            <span class="text-sm font-normal italic text-gray-200">
                                                APP_URL=&lt;website url&gt;
                                            </span>
                                        </code>
                                    </div>
                                </li>
                                <li>
                                    <strong>Creating application key</strong>
                                    <p>Set your application key to a random string, and you may do it with the following
                                        command:
                                    </p>
                                    <div class="flex w-full justify-start">
                                        <code class="w-full rounded-md bg-gray-800 p-2">
                                            <span class="text-sm font-normal italic text-gray-200">
                                                php artisan key:generate
                                            </span>
                                        </code>
                                    </div>
                                </li>
                                <li>
                                    <strong>Handling media upload</strong>
                                    <p>By default, Galon Mart use local drive to store its files in storage/app/public. To
                                        make these files accessible from the web, you should create a symbolic link from
                                        public/storage to storage/app/public. You may use the storage: link Artisan
                                        command:
                                    </p>
                                    <div class="flex w-full justify-start">
                                        <code class="w-full rounded-md bg-gray-800 p-2">
                                            <span class="text-sm font-normal italic text-gray-200">
                                                php artisan storage:link
                                            </span>
                                        </code>
                                    </div>
                                </li>
                                <li>
                                    <strong>Preparing database</strong>
                                    <p>Use any of your Mysql management software or phpMyadmin to create a new database
                                        for Galon Mart with utf8mb4 charset encoding and utf8mb4_unicode_ci collection.
                                        After that update your database credentials in .env file (an example):
                                    </p>
                                    <div class="flex w-full justify-start">
                                        <code class="w-full rounded-md bg-gray-800 p-2">
                                            <p class="text-sm font-normal italic text-gray-200">
                                                DB_DATABASE=&lt;your-database-name&gt;
                                            </p>
                                            <p class="text-sm font-normal italic text-gray-200">
                                                DB_USERNAME=&lt;your-database-username&gt;
                                            </p>
                                            <p class="text-sm font-normal italic text-gray-200">
                                                DB_PASSWORD=&lt;your-database-password&gt;
                                            </p>
                                        </code>
                                    </div>
                                    <p>If your MySQL database is on a different server you should also update the
                                        following variables to match your external MySQL server connection:
                                    </p>
                                    <div class="flex w-full justify-start">
                                        <code class="w-full rounded-md bg-gray-800 p-2">
                                            <p class="text-sm font-normal italic text-gray-200">
                                                DB_CONNECTION=mysql
                                            </p>
                                            <p class="text-sm font-normal italic text-gray-200">
                                                DB_HOST=&lt;your-database-host&gt;
                                            </p>
                                            <p class="text-sm font-normal italic text-gray-200">
                                                DB_PORT=&lt;your-database-port&gt;
                                            </p>
                                        </code>
                                    </div>
                                </li>

                                <li>
                                    <strong>Database migration and demo data installation</strong>
                                    <p>Run the following command for database migration and demo installation:
                                    </p>
                                    <div class="flex w-full justify-start">
                                        <code class="w-full rounded-md bg-gray-800 p-2">
                                            <span class="text-sm font-normal italic text-gray-200">
                                                php artisan migrate:fresh --seed
                                            </span>
                                        </code>
                                    </div>
                                    <p>Congratulations: Your site is ready to be viewed.</p>
                                </li>
                                <li>
                                    <strong>Login to admin/customer dashboard</strong>
                                    <p>For admin dashboard use the follwing link and cridentials</p>
                                    <div class="flex w-full justify-start">
                                        <code class="w-full rounded-md border border-gray-400 p-2">
                                            <span class="text-sm font-normal text-blue-900">
                                                <p>https://&lt;your-website-url&gt;/admin</p>
                                                <p>email: admin@Galon Mart.biz</p>
                                                <p>password: Galon Mart</p>
                                            </span>
                                        </code>
                                    </div>
                                    <p>For customer dashboard use the follwing link and cridentials</p>
                                    <div class="flex w-full justify-start">
                                        <code class="w-full rounded-md border border-gray-400 p-2">
                                            <span class="text-sm font-normal text-blue-900">
                                                <p>https://&lt;your-website-url&gt;/login</p>
                                                <p>email: customer@Galon Mart.biz</p>
                                                <p>password: Galon Mart</p>
                                            </span>
                                        </code>
                                    </div>
                                </li>
                            </ul>
                            <p class="py-4 text-lg font-semibold">That's it. You've successfully finished your store
                                installation.
                            </p>
                        </div>
                        <div id="config" class="mx-auto mt-10 max-w-7xl px-4 sm:px-6 md:px-8">
                            <h1 class="pt-16 pb-4 text-2xl font-semibold text-gray-900">Configuration</h1>
                            <ul class="list-disc space-y-2 px-4">
                                <li>
                                    <strong>Website language configuration</strong>
                                    <p>
                                        By default English (en) and Indonesia (ar) are used in Galon Mart platform. However,
                                        languages can be changed from: <span class="italic">
                                            &lt;website-directory&gt; /app/config/app.php
                                        </span> directory. Also, can make the default language for locale variable. The
                                        locale and languages code is as follow:
                                    </p>
                                    <div class="flex w-full justify-start">
                                        <code class="w-full rounded-md border border-gray-400 p-2">
                                            <span class="text-sm font-normal text-blue-900">
                                                <p>'locale' => 'en',</p>
                                                <p>'languages' => [
                                                    'en', 'id'
                                                    ],</p>
                                            </span>
                                        </code>
                                    </div>
                                    <p class="my-4 bg-yellow-700 p-2 text-white">Note that currently the platform
                                        supports only two
                                        languages (en, ar). For changing languages ... need to customize all models with
                                        tables
                                        required translation.
                                </li>
                            </ul>
                            <p>Currency, logo, icon and other settings stored in database in settings table and can be
                                localized from admin panel.</p>
                        </div>
                        <div id="support" class="mx-auto mt-10 max-w-7xl px-4 sm:px-6 md:px-8">
                            <h1 class="pt-16 pb-4 text-2xl font-semibold text-gray-900">Support</h1>
                            For support, you can email us via: <strong>support@Galon Mart.biz</strong>
                        </div>
                    </section>

                    <section class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
                        <div id="settings" class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
                            <h1 class="pt-16 pb-4 text-left text-2xl font-semibold text-gray-900">Settings</h1>
                            <p> Lets start with website personalization. From your admin panel use the sidebar to
                                navigate to settings item.</p>
                            <div class="py-4">
                                <img src="{{ asset('storage/guide/settings.png') }}" />
                            </div>
                            <ul class="list-decimal px-4">
                                <li>
                                    <strong>General Settings</strong>
                                    <p>In this page you can update the general website settings like logo, icon, title,
                                        description, keywords, currency, contact info, home page settings, footer,
                                        social links, and branches.
                                    </p>
                                </li>
                                <li>
                                    <strong>Roles</strong>
                                    <p>Roles are so important in eCommerce website. In this page you can
                                        add/edit/update/delete roles and assign them for different users. However, the
                                        default role for new customers is <span class="italic">Customer</span>
                                    </p>
                                </li>
                                <li>
                                    <strong>Appearance</strong>
                                    <p>This place make website layout so easy to change.
                                    <p>Three different website themes
                                        (Basic, Modern, and Light). Basic is the default theme.
                                    </p>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div id="categories" class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
                            <h1 class="pt-16 pb-4 text-left text-2xl font-semibold text-gray-900">Categories</h1>
                            <p> Managing and showing products in categories makes the website well orignized.</p>
                            <p>Before adding products, categories must be creaated first. You can add/edit/delete
                                product categories from going to admin panel->store->categories</p>
                            <p>Categories can have sub categories by selecting the parent category or leave it empty for
                                the main categories</p>
                            <div class="py-4">
                                <img src="{{ asset('storage/guide/categories.png') }}" />
                            </div>
                            <p class="bg-yellow-600 p-2 italic text-white">Note: Sort number is to arrange the items in
                                customized order, therefore, the items will be
                                displayed based on sort number and the created date oreder</p>
                        </div>
                        <div id="brands" class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
                            <h1 class="pt-16 pb-4 text-left text-2xl font-semibold text-gray-900">Brands</h1>
                            <p> Products brand is usefull for classifing products by brand and search products by their
                                brands.
                            </p>
                            <p>Adding brands is easy as categories but brands does not have sub brands. </p>
                        </div>

                        <div id="products" class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
                            <h1 class="pt-16 pb-4 text-left text-2xl font-semibold text-gray-900">Products</h1>
                            <p> Product is the main part in the ecommerce website and it is the most important item to
                                be considered.
                                Adding products is the main functionality of eCommerce websites and here we are going to
                                cover all the details of adding/editing/deletiong products
                            </p>
                            <p>Go to: admin dashboard -> Store -> products
                            </p>
                            <div class="py-4">
                                <img src="{{ asset('storage/guide/products.jpg') }}" />
                            </div>
                            <ul class="list-disc py-4">
                                <li>
                                    <strong>Add new product</strong>
                                    <p>New product page has four parts. Product main information like name, slug,
                                        excerpt, and
                                        description.
                                    </p>
                                    <p>The second part is the price, quantity, category, and brand.</p>
                                    <p>Third, the additional information like features and display options.</p>
                                    <p>Finally, the images part. You can add many images as you want. The first image
                                        will be
                                        the main product image.</p>
                                    <p>Product enabled or disabled button will show or hide product from customers.</p>
                                    <div class="py-4">
                                        <img src="{{ asset('storage/guide/add-product.jpg') }}" />
                                    </div>
                                    <strong class="text-red-700">Do not forget to click save button</strong>
                                </li>
                                <li>
                                    <strong>Edit product</strong>
                                    <p>In edit product page, each section can be saved separately.</p>
                                    <div class="py-4">
                                        <img src="{{ asset('storage/guide/edit-product.jpg') }}" />
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div id="pages" class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
                            <h1 class="pt-16 pb-4 text-left text-2xl font-semibold text-gray-900">Pages</h1>
                            <p> About and contact us pages can be edited from code level by going to:</p>
                            <p>&lt;website-directory&gt;/resoucres/views/pages
                            </p>
                            <p> The contact page read the details like email, contact number, and address from settings
                                table.</p>
                        </div>
                        <div id="blog-cats" class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
                            <h1 class="pt-16 pb-4 text-left text-2xl font-semibold text-gray-900">Blog categories</h1>
                            <p> Blog posts are cassified into categories and must be added before creating posts. </p>
                            <p> Blog categories can be updated from admin dashboard -> Blog -> blog categories. </p>
                        </div>
                        <div id="blog-posts" class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
                            <h1 class="pt-16 pb-4 text-left text-2xl font-semibold text-gray-900">Blog posts</h1>
                            <p> Company news are important for eCommerce website. Therefore, Galon Mart has a very good
                                blog to add posts regarding company news, events, and campaigns. </p>
                            <p> Blog posts can be updated from admin dashboard -> Blog -> blog posts. </p>
                            <div class="py-4">
                                <img src="{{ asset('storage/guide/blog.jpg') }}" />
                            </div>

                            <p>You can add post will all necessary fields, post image, and post tags</p>
                            <div class="py-4">
                                <img src="{{ asset('storage/guide/add-post.jpg') }}" />
                            </div>
                            <p> The customer can see the latest news by clicking news from the website footer.</p>
                            <div class="py-4">
                                <img src="{{ asset('storage/guide/news.jpg') }}" />
                            </div>
                        </div>
                        <div id="devlopers" class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
                            <h1 class="pt-16 pb-4 text-left text-2xl font-semibold text-gray-900">In progress work</h1>
                            <p>Galon Mart platform is a good starting point for eCommerce websites with laravel,
                                Tailwindcss, livewire, and alpinejs. However, there are works in progress to make the
                                website more functional and professional. Some of works will be aavailable in upcoming
                                version soon. The progress works includes:</p>
                            <ul class="list-decimal px-4">
                                <li>Products varients and options</li>
                                <li>Payment methodes</li>
                                <li>Shipping options</li>
                                <li>APIs</li>
                                <li> Add posts including images</li>
                                <li>Add more languages</li>
                                <li>Dark mode</li>
                                <li>Printing invoice</li>
                            </ul>
                        </div>
                    </section>
            </main>
        </div>
    </div>

    @stack('modals')
    @livewireScripts
</body>

</html>
