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
    <title>{{ $post->tittle }} - Sugar Ahen</title>
    <style>
        /* Content styling */
        .post-content {
            line-height: 1.8;
        }
        
        .post-content p {
            margin-bottom: 1.5rem;
        }
        
        .post-content h2 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }
        
        .post-content h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
        }
        
        .post-content ul, .post-content ol {
            margin-left: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .post-content li {
            margin-bottom: 0.5rem;
        }
        
        .post-content img {
            border-radius: 0.5rem;
            margin: 2rem 0;
        }
        
        .post-content blockquote {
            border-left: 4px solid #F59E0B;
            padding-left: 1rem;
            font-style: italic;
            margin: 1.5rem 0;
            color: #4B5563;
        }
    </style>
</head>

<body class="h-full">

    <div class="min-h-full">
        <!-- Static Navbar (non-sticky) -->
        <x-navbar></x-navbar>

        <!-- Main Content -->
        <main class="bg-gray-100 py-8">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Post Header -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <!-- Post Image -->
                    <div class="w-full h-80 overflow-hidden">
                        @if($post->image)
                            <img src="{{ $post->image }}" alt="{{ $post->tittle }}" class="w-full h-full object-cover">
                        @else
                            <img src="https://source.unsplash.com/random/1200x600/?blog" alt="{{ $post->tittle }}" class="w-full h-full object-cover">
                        @endif
                    </div>
                    
                    <!-- Post Meta -->
                    <div class="p-8">
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $post->tittle }}</h1>
                        <div class="flex items-center text-gray-600 mb-8">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-amber-500 flex items-center justify-center text-white font-bold mr-3">
                                    {{ substr($post->author, 0, 1) }}
                                </div>
                                <div>
                                    <p class="font-medium">{{ $post->author }}</p>
                                    @if($post->created_at)
                                        <p class="text-sm">{{ $post->created_at->format('M d, Y') }} · {{ $post->created_at->diffForHumans() }}</p>
                                    @else
                                        <p class="text-sm">Recently published</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!-- Post Content -->
                        <div class="post-content text-gray-800">
                            {!! $post->body !!}
                        </div>
                        <h3 class="text-lg font-semibold mb-4">Share this post</h3>
                        <div class="flex space-x-4">
                            <a href="https://facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="bg-blue-600 text-white p-3 rounded-full hover:bg-blue-700">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $post->tittle }}" target="_blank" class="bg-blue-400 text-white p-3 rounded-full hover:bg-blue-500">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://wa.me/?text={{ $post->tittle }} {{ url()->current() }}" target="_blank" class="bg-green-500 text-white p-3 rounded-full hover:bg-green-600">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="mailto:?subject={{ $post->tittle }}&body=Check out this post: {{ url()->current() }}" class="bg-red-500 text-white p-3 rounded-full hover:bg-red-600">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Related Posts Section (if you want to implement this later) -->
                <!-- <div class="mt-12">
                    <h2 class="text-2xl font-bold mb-6">You might also like</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        Related posts would go here
                    </div>
                </div> -->
            </div>
        </main>

        <!-- Footer -->
        <x-footer></x-footer>
    </div>

    <script>
        // Set current year in footer
        document.getElementById('current-year').textContent = new Date().getFullYear();
    </script>
</body>

</html>
