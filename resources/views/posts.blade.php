<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Blog - Sugar Ahen</title>
    <style>
        /* Blog card hover effect */
        .blog-image img {
            transition: transform 0.3s ease;
        }

        .blog-card:hover .blog-image img {
            transform: scale(1.05);
        }

        /* Make blog cards clickable with hover effect */
        .blog-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            cursor: pointer;
        }

        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>

<body class="h-full">

    <div class="min-h-full">
        <!-- Static Navbar (non-sticky) -->
        <x-navbar></x-navbar>

        <!-- Search Bar - Positioned below navbar with proper spacing -->
        <div class="bg-gray-200 py-6 border-b border-gray-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative max-w-md mx-auto">
                    <form action="/posts" method="GET">
                        <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}"
                            class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                        <button type="submit" class="absolute right-0 top-0 mt-2 mr-3 text-gray-600">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <main class="bg-gray-200 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Blog Posts Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @if($posts->count())
                        @foreach($posts as $post)
                            <div class="blog-card bg-white rounded-lg overflow-hidden shadow-md">
                                <a href="/posts/{{ $post->slug }}">
                                    <div class="blog-image overflow-hidden h-48">
                                        @if($post->image)
                                            @if(strpos($post->image, 'http') === 0)
                                                <!-- Untuk gambar lama yang masih berupa URL -->
                                                <img src="{{ $post->image }}" alt="{{ $post->tittle }}" class="w-full h-full object-cover">
                                            @else
                                                <!-- Untuk gambar baru yang disimpan sebagai base64 -->
                                                <img src="data:image/jpeg;base64,{{ $post->image }}" alt="{{ $post->tittle }}" class="w-full h-full object-cover">
                                            @endif
                                        @else
                                            <img src="https://source.unsplash.com/random/800x600/?blog" alt="{{ $post->tittle }}" class="w-full h-full object-cover">
                                        @endif
                                    </div>
                                    <div class="p-6">
                                        <h3 class="text-xl font-bold mb-2 text-gray-900">{{ $post->tittle }}</h3>
                                        <p class="text-sm text-gray-600 mb-4">
                                            {{ $post->author }} 
                                            @if($post->created_at)
                                                · {{ $post->created_at->format('M d, Y') }}
                                            @endif
                                        </p>
                                        <p class="text-gray-700 mb-4">{{ Str::limit(strip_tags($post->body), 100) }}</p>
                                        <div class="flex justify-between items-center">
                                            <span class="text-amber-500 font-medium">Read more</span>
                                            <span class="text-gray-500">
                                                <i class="far fa-clock mr-1"></i>
                                                @if($post->created_at)
                                                    {{ $post->created_at->diffForHumans() }}
                                                @else
                                                    Recently
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <div class="col-span-3 text-center py-12">
                            <h3 class="text-xl font-medium text-gray-900">No posts found</h3>
                            <p class="mt-2 text-gray-600">Try adjusting your search or filter criteria</p>
                        </div>
                    @endif
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $posts->links() }}
                </div>
            </div>
        </main>

        <!-- Footer -->
        <x-footer></x-footer>
        <!-- Komponen Chat WhatsApp -->
        <x-chat></x-chat>
    </div>

    <script>
        // Set current year in footer
        document.getElementById('current-year').textContent = new Date().getFullYear();
    </script>
</body>

</html>