<nav x-data="{
    navMenu: false,
    mobileMenu: false,
    profileMenu: false,
    cartOpen: false,
    activeMenu: 0,
    activeMenuClass: 'text-gray-900 bg-gray-100',
    inactiveMenuClass: 'text-gray-500'
}" class="">
    <!-- Top Nav -->
    <x-layouts2.guest-top-nav />
    <!-- Main Manu -->
    <x-layouts2.guest-main-menu />
    <x-layouts2.guest-mobile-menu />
    <!-- Open Cart-->
     @livewire('cart-component')
</nav>
