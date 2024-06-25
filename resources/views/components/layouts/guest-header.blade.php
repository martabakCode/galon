<nav x-data="{
    navMenu: false,
    mobileMenu: false,
    profileMenu: false,
    cartOpen: false
}" class="">
    <!-- Top Nav -->
    <x-layouts.guest-top-nav />
    <!-- Main Manu -->
    <x-layouts.guest-main-menu />
    <x-layouts.guest-mobile-menu />
    <!-- Open Cart-->
    @livewire('cart-component')
</nav>
