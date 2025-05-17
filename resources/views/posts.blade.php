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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/ahen.png">
    <title>Blog - Sugarahen</title>
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

        /* Loading spinner */
        .spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(0, 0, 0, 0.1);
            border-top-color: #f59e0b;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
        
        /* Mobile specific adjustments */
        @media (max-width: 768px) {
            .mobile-container {
                padding-left: 1rem;
                padding-right: 1rem;
            }
            
            .blog-card {
                max-width: 92%;
                margin-left: auto;
                margin-right: auto;
            }
        }
    </style>
</head>

<body class="h-full">

    <div class="min-h-full" x-data="{
        lastScrollTop: 0,
        showNavbar: true,
        handleScroll() {
            let st = window.pageYOffset || document.documentElement.scrollTop;
            if (st > this.lastScrollTop && st > 100) {
                // Scrolling down
                this.showNavbar = false;
            } else {
                // Scrolling up
                this.showNavbar = true;
            }
            this.lastScrollTop = st <= 0 ? 0 : st;
        }
    }" x-init="window.addEventListener('scroll', () => handleScroll())">
        <!-- Sticky Navbar -->
        <x-navbar></x-navbar>

        <!-- Main Content -->
        <main class="bg-white py-10 mt-9">
            <div class="max-w-7xl mx-auto px-6 sm:px-6 lg:px-8 mobile-container">
                <!-- Search Bar - Moved below the navbar with more spacing -->
                <div class="py-6 border-b border-gray-150 mb-10">
                    <div class="relative max-w-md mx-auto">
                        <input type="text" id="search-input" name="search" placeholder="Search..."
                            value="{{ request('search') }}"
                            class="w-full pl-4 pr-10 py-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent shadow-sm">
                            <div class="absolute right-3 top-1/2 transform -translate-y-1/2 flex items-center">
                            <div id="search-spinner" class="spinner mr-2"></div>
                            <i class="fas fa-search text-gray-600"></i>
                        </div>
                    </div>
                </div>

                <!-- Blog Posts Grid -->
                <div id="posts-container" class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                    @if ($posts->count())
                        @foreach ($posts as $post)
                            <div class="blog-card bg-white rounded-lg overflow-hidden shadow-md">
                                <a href="/posts/{{ $post->slug }}">
                                    <div class="blog-image overflow-hidden h-48">
                                        @if ($post->image)
                                            @if (strpos($post->image, 'http') === 0)
                                                <!-- Untuk gambar lama yang masih berupa URL -->
                                                <img src="{{ $post->image }}" alt="{{ $post->tittle }}"
                                                    class="w-full h-full object-cover">
                                            @else
                                                <!-- Untuk gambar baru yang disimpan sebagai base64 -->
                                                <img src="data:image/jpeg;base64,{{ $post->image }}"
                                                    alt="{{ $post->tittle }}" class="w-full h-full object-cover">
                                            @endif
                                        @else
                                            <img src="https://source.unsplash.com/random/800x600/?blog"
                                                alt="{{ $post->tittle }}" class="w-full h-full object-cover">
                                        @endif
                                    </div>
                                    <div class="px-6 py-5">
                                        <h3 class="text-xl font-bold mb-2 text-gray-900">{{ $post->tittle }}</h3>
                                        <p class="text-sm text-gray-600 mb-4">
                                            {{ $post->author }}
                                            @if ($post->created_at)
                                                · {{ $post->created_at->format('M d, Y') }}
                                            @endif
                                        </p>
                                        <p class="text-gray-700 mb-4">{{ Str::limit(strip_tags($post->body), 100) }}
                                        </p>
                                        <div class="flex justify-between items-center">
                                            <span class="text-amber-500 font-medium">Read more</span>
                                            <span class="text-gray-500">
                                                <i class="far fa-clock mr-1"></i>
                                                @if ($post->created_at)
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
                <div id="pagination-container" class="mt-12">
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

        // Real-time search functionality
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-input');
            const postsContainer = document.getElementById('posts-container');
            const paginationContainer = document.getElementById('pagination-container');
            const searchSpinner = document.getElementById('search-spinner');
            let debounceTimer;

            // Function to create a blog card HTML
            function createBlogCard(post) {
                const createdAt = post.created_at ? new Date(post.created_at) : null;
                const formattedDate = createdAt ? new Intl.DateTimeFormat('en', {
                    month: 'short',
                    day: '2-digit',
                    year: 'numeric'
                }).format(createdAt) : '';
                const timeAgo = post.time_ago || 'Recently';

                let imageHtml =
                    `<img src="https://source.unsplash.com/random/800x600/?blog" alt="${post.tittle}" class="w-full h-full object-cover">`;

                if (post.image) {
                    if (post.image.startsWith('http')) {
                        imageHtml =
                            `<img src="${post.image}" alt="${post.tittle}" class="w-full h-full object-cover">`;
                    } else {
                        imageHtml =
                            `<img src="data:image/jpeg;base64,${post.image}" alt="${post.tittle}" class="w-full h-full object-cover">`;
                    }
                }

                return `
                    <div class="blog-card bg-white rounded-lg overflow-hidden shadow-md">
                        <a href="/posts/${post.slug}">
                            <div class="blog-image overflow-hidden h-48">
                                ${imageHtml}
                            </div>
                            <div class="px-6 py-5">
                                <h3 class="text-xl font-bold mb-2 text-gray-900">${post.tittle}</h3>
                                <p class="text-sm text-gray-600 mb-4">
                                    ${post.author} ${createdAt ? '· ' + formattedDate : ''}
                                </p>
                                <p class="text-gray-700 mb-4">${post.excerpt || ''}</p>
                                <div class="flex justify-between items-center">
                                    <span class="text-amber-500 font-medium">Read more</span>
                                    <span class="text-gray-500">
                                        <i class="far fa-clock mr-1"></i>
                                        ${timeAgo}
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                `;
            }

            // Function to create empty state HTML
            function createEmptyState() {
                return `
                    <div class="col-span-3 text-center py-12">
                        <h3 class="text-xl font-medium text-gray-900">No posts found</h3>
                        <p class="mt-2 text-gray-600">Try adjusting your search or filter criteria</p>
                    </div>
                `;
            }

            // Function to fetch posts based on search query
            function fetchPosts(query) {
                searchSpinner.style.display = 'block';

                fetch(`/posts/search?q=${encodeURIComponent(query)}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        searchSpinner.style.display = 'none';

                        // Clear the container
                        postsContainer.innerHTML = '';

                        if (data.posts && data.posts.length > 0) {
                            // Add each post to the container
                            data.posts.forEach(post => {
                                postsContainer.innerHTML += createBlogCard(post);
                            });

                            // Update pagination if provided
                            if (data.pagination) {
                                paginationContainer.innerHTML = data.pagination;
                            } else {
                                paginationContainer.innerHTML = '';
                            }
                        } else {
                            // Show empty state
                            postsContainer.innerHTML = createEmptyState();
                            paginationContainer.innerHTML = '';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching posts:', error);
                        searchSpinner.style.display = 'none';
                    });
            }

            // Add event listener for input changes with debounce
            searchInput.addEventListener('input', function() {
                const query = this.value.trim();

                clearTimeout(debounceTimer);

                debounceTimer = setTimeout(() => {
                    // Selalu fetch, walaupun query kosong
                    fetchPosts(query);
                }, 300);
            });

        });
    </script>
</body>

</html>