<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/ahen.png">
    <title>@yield('title', 'Admin Dashboard') - Sugar Ahen</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100">
    <div x-data="{ sidebarOpen: false }" class="min-h-screen flex flex-col">
        <!-- Top Navigation -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between h-16">
                <div class="flex items-center">
                    <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none focus:text-gray-700 md:hidden">
                        <i class="fas fa-bars"></i>
                    </button>
                    <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-amber-500 ml-4 md:ml-0">Dashboard Sugar<span class="text-gray-950">ahen</span></a>
                </div>
                <div class="flex items-center">
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center text-gray-700 focus:outline-none">
                            <span class="mr-2">{{ Auth::guard('admin')->user()->name }}</span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                            <form method="POST" action="{{ route('admin.logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex flex-1">
            <!-- Sidebar Backdrop - closes sidebar when clicked -->
            <div 
                x-show="sidebarOpen" 
                @click="sidebarOpen = false" 
                class="fixed inset-0 bg-black bg-opacity-50 z-20 md:hidden transition-opacity duration-300 ease-in-out">
            </div>
            <!-- Sidebar -->
            <div :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}" class="fixed inset-y-0 left-0 z-30 w-64 bg-white shadow transform transition-transform duration-300 ease-in-out md:translate-x-0 md:static md:inset-auto">
                <div class="flex flex-col h-full">
                    <!-- Close button - only visible on mobile -->
                    <div class="flex justify-end p-4 md:hidden">
                        <button @click="sidebarOpen = false" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="overflow-y-auto flex-grow">
                        <nav class="px-4 py-4">
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center py-2 px-4 text-gray-700 rounded hover:bg-gray-100 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100' : '' }}">
                                <i class="fas fa-tachometer-alt mr-3"></i>
                                <span>Dashboard</span>
                            </a>
                            <a href="{{ route('admin.posts.create') }}" class="flex items-center py-2 px-4 text-gray-700 rounded hover:bg-gray-100 {{ request()->routeIs('admin.posts.create') ? 'bg-gray-100' : '' }}">
                                <i class="fas fa-plus mr-3"></i>
                                <span>Add New Post</span>
                            </a>
                            <a href="/" target="_blank" class="flex items-center py-2 px-4 text-gray-700 rounded hover:bg-gray-100">
                                <i class="fas fa-globe mr-3"></i>
                                <span>View Website</span>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>