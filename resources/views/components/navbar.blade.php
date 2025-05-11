<!-- Sticky Navbar -->
<nav class="bg-white shadow-md transition-all duration-300 fixed top-0 left-0 right-0 z-50"
    :class="{ 'transform translate-y-0': showNavbar, 'transform -translate-y-full': !showNavbar }"
    x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex-shrink-0">
                <a href="/" class="flex items-center">
                    <span class="text-xl font-bold text-amber-500">Sugar<span class="text-gray-950">ahen</span></span>
                </a>
            </div>
            <div class="hidden md:block flex-grow">
                <div class="flex items-baseline justify-center space-x-4">
                    <a href="/"
                        class="rounded-md px-3 py-2 text-sm {{ request()->is('/') ? 'font-bold text-amber-500' : 'font-medium text-gray-950 hover:bg-gray-100 hover:text-gray-900' }}"
                        aria-current="page">Home</a>
                    <a href="/about"
                        class="rounded-md px-3 py-2 text-sm {{ request()->is('about') ? 'font-bold text-amber-500' : 'font-medium text-gray-950 hover:bg-gray-100 hover:text-gray-900' }}"
                        aria-current="page">About</a>
                    <a href="/products"
                        class="rounded-md px-3 py-2 text-sm {{ request()->is('products') ? 'font-bold text-amber-500' : 'font-medium text-gray-950 hover:bg-gray-100 hover:text-gray-900' }}"
                        aria-current="page">Products</a>
                    <a href="/posts"
                        class="rounded-md px-3 py-2 text-sm {{ request()->is('posts') ? 'font-bold text-amber-500' : 'font-medium text-gray-950 hover:bg-gray-100 hover:text-gray-900' }}"
                        aria-current="page">Blog</a>
                    <a href="/contact"
                        class="rounded-md px-3 py-2 text-sm {{ request()->is('contact') ? 'font-bold text-amber-500' : 'font-medium text-gray-950 hover:bg-gray-100 hover:text-gray-900' }}"
                        aria-current="page">Contact</a>
                </div>
            </div>
            <div class="hidden md:flex items-center space-x-4">
                <a href="https://www.facebook.com/profile.php?id=61575351231690&locale=id_ID"
                    class="text-gray-950 hover:text-gray-900">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/sugarahen_/" class="text-gray-950 hover:text-gray-900">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://youtube.com/@ahensugar?si=Ygfb61qyDx1iLg5X" class="text-gray-950 hover:text-gray-900">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" @click="isOpen = !isOpen"
                    class="relative inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 focus:outline-hidden"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block size-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                        data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden size-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                        data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <a href="/"
                class="block rounded-md px-3 py-2 text-base {{ request()->is('/') ? ' bg-gray-100 font-bold text-amber-500' : 'font-medium text-gray-950 hover:bg-gray-100 hover:text-gray-900' }}"
                aria-current="page">Home</a>
            <a href="/about"
                class="block rounded-md px-3 py-2 text-base {{ request()->is('about') ? 'bg-gray-100 font-bold text-amber-500' : 'font-medium text-gray-950 hover:bg-gray-100 hover:text-gray-900' }}"
                aria-current="page">About</a>
            <a href="/products"
                class="block rounded-md px-3 py-2 text-base {{ request()->is('products') ? 'bg-gray-100 font-bold text-amber-500' : 'font-medium text-gray-950 hover:bg-gray-100 hover:text-gray-900' }}"
                aria-current="page">Products</a>
            <a href="/posts"
                class="block rounded-md px-3 py-2 text-base {{ request()->is('posts') ? 'bg-gray-100 font-bold text-amber-500' : 'font-medium text-gray-950 hover:bg-gray-100 hover:text-gray-900' }}"
                aria-current="page">Blog</a>
            <a href="/contact"
                class="block rounded-md px-3 py-2 text-base {{ request()->is('contact') ? 'bg-gray-100 font-bold text-amber-500' : 'font-medium text-gray-950 hover:bg-gray-100 hover:text-gray-900' }}"
                aria-current="page">Contact</a>
        </div>
        <div class="border-t border-gray-200 pt-4 pb-3 px-4">
            <div class="flex space-x-4">
                <a href="https://www.facebook.com/profile.php?id=61575351231690&locale=id_ID"
                    class="text-gray-950 hover:text-gray-900">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/sugarahen_/" class="text-gray-950 hover:text-gray-900">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://youtube.com/@ahensugar?si=Ygfb61qyDx1iLg5X" class="text-gray-950 hover:text-gray-900">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
</nav>