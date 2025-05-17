<!DOCTYPE html>
<html lang="id" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/ahen.png">
    <title>{{ $post->tittle }} - Sugarahen</title>
    <style>
        /* Content styling */
        .post-content {
            line-height: 1.8;
            text-align: justify;
        }

        .post-content p {
            margin-bottom: 1.5rem;
            text-align: justify;
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

        .post-content ul,
        .post-content ol {
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
            border-left: 4px solid #0EA5E9;
            padding-left: 1rem;
            font-style: italic;
            margin: 1.5rem 0;
            color: #4B5563;
        }

        .post-content a {
            color: #0EA5E9;
            text-decoration: underline;
            transition: color 0.2s;
        }

        .post-content a:hover {
            color: #0284C7;
        }

        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #f3f4f6;
            color: #6b7280;
            transition: all 0.2s;
        }

        .social-icon:hover {
            background-color: #e5e7eb;
        }

        /* Custom Notification Styling */
        #notification-container {
            position: fixed;
            top: 75px;
            left: 0;
            right: 0;
            width: 100%;
            z-index: 10000;
            display: none;
            text-align: center;
        }

        .notification {
            background-color: white;
            color: black;
            padding: 12px 24px;
            margin: 0 auto;
            border-bottom: 1px solid #eaeaea;
            font-weight: 500;
            display: inline-block;
            max-width: 80%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 6px;
        }

        @media (min-width: 768px) {
            #notification-container {
                width: auto;
                left: 50%;
                transform: translateX(-50%);
            }

            .notification {
                width: auto;
                max-width: 300px;
            }
        }
    </style>
</head>

<body class="h-full">
    <!-- Notification Container -->
    <div id="notification-container">
        <div class="notification">Link Copied to Clipboard</div>
    </div>

    <div class="min-h-full flex flex-col" x-data="{
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
        <main class="bg-gray-100 mt-24 flex-grow">
            <div class="bg-white rounded-lg overflow-hidden">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col lg:flex-row gap-12 pb-16" x-data="stickyScroll()">
                        <!-- Main Content Column -->
                        <div class="order-1 lg:w-2/3" x-ref="mainContent">
                            <!-- Author and Date -->
                            <div class="text-gray-500 py-5">
                                {{ $post->author }} —
                                @if ($post->created_at)
                                    {{ $post->created_at->format('l, d F Y') }} ·
                                    {{ $post->created_at->diffForHumans() }}
                                @else
                                    Recently published
                                @endif
                            </div>

                            <!-- Post Title -->
                            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $post->tittle }}</h1>

                            <!-- Social Sharing -->
                            <div class="flex space-x-4 mb-6">
                                <a href="#" onclick="copyLink(); return false;" class="social-icon">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $post->tittle }}"
                                    target="_blank" class="social-icon">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                    target="_blank" class="social-icon">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" onclick="copyLink(); return false;" class="social-icon">
                                    <i class="fas fa-link"></i>
                                </a>
                            </div>

                            <!-- Featured Image -->
                            <div class="w-full mb-10 aspect-[3/2] overflow-hidden rounded-lg">
                                @if ($post->image)
                                    @if (strpos($post->image, 'http') === 0)
                                        <!-- Untuk gambar lama yang masih berupa URL -->
                                        <img src="{{ $post->image }}" alt="{{ $post->tittle }}"
                                            class="w-full h-full object-cover object-center">
                                    @else
                                        <!-- Untuk gambar baru yang disimpan sebagai base64 -->
                                        <img src="data:image/jpeg;base64,{{ $post->image }}"
                                            alt="{{ $post->tittle }}" class="w-full h-full object-cover object-center">
                                    @endif
                                @else
                                    <img src="https://source.unsplash.com/random/1200x800/?wordpress"
                                        alt="{{ $post->tittle }}" class="w-full h-full object-cover object-center">
                                @endif
                            </div>

                            <!-- Post Content -->
                            <div class="post-content text-gray-800 mb-8">
                                {!! nl2br($post->body) !!}
                            </div>
                        </div>

                        <!-- Sidebar -->
                        <div class="order-2 lg:w-2/5 lg:pl-6">
                            <div x-ref="sidebar" :style="!isMobile ? { position: position, top: `${top}px` } : {}"
                                class="max-w-sm">
                                <h2 class="text-3xl font-bold mt-4 mb-4">Latest News</h2>
                                <!-- Latest Posts -->
                                @php
                                    $latestPosts = \App\Models\Post::latest()
                                        ->where('id', '!=', $post->id)
                                        ->take(5)
                                        ->get();
                                @endphp

                                @foreach ($latestPosts as $latestPost)
                                    <div class="mb-5">
                                        <div class="text-sky-500 font-medium uppercase text-sm mb-2">INFORMASI</div>
                                        <a href="/posts/{{ $latestPost->slug }}" class="block">
                                            <h3 class="text-xl font-semibold text-gray-900 mb-2 hover:text-sky-600">
                                                {{ $latestPost->tittle }}</h3>
                                        </a>
                                        <div class="border-b border-gray-150">
                                            <div class="text-gray-500 text-sm mb-5">
                                                @if ($latestPost->created_at)
                                                    {{ $latestPost->created_at->format('d F Y') }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
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

        // Notification functions
        function showNotification() {
            const container = document.getElementById('notification-container');
            container.style.display = 'block';
            container.classList.add('notification-show');

            // Hide after 2 seconds
            setTimeout(() => {
                container.classList.add('notification-hide');
                setTimeout(() => {
                    container.classList.remove('notification-show');
                    container.classList.remove('notification-hide');
                    container.style.display = 'none';
                }, 200);
            }, 3500); // Changed back to 5 seconds as requested earlier
        }

        function copyLink() {
            navigator.clipboard.writeText('{{ url()->current() }}');
            showNotification();
        }

        // Alpine.js fungsi untuk sticky sidebar with bottom boundary
        function stickyScroll() {
            return {
                position: 'relative',
                top: 0,
                sidebarHeight: 0,
                mainContentHeight: 0,
                sidebarOffset: 0,
                footerHeight: 0,
                footerOffset: 0,
                windowHeight: 0,
                initialTopOffset: 48, // Initial top offset in pixels (24px = top-6)
                bottomMargin: 30, // No margin from bottom of content (align with the last line)
                isMobile: window.innerWidth < 1024, // Check if mobile view (matches lg breakpoint)

                init() {
                    // Get initial measurements
                    this.updateMeasurements();

                    // Add scroll event listener
                    window.addEventListener('scroll', () => this.handleStickyScroll());

                    // Add resize event listener to update measurements
                    window.addEventListener('resize', () => {
                        this.isMobile = window.innerWidth < 1024;
                        this.updateMeasurements();
                        this.handleStickyScroll();
                    });

                    // Initial position calculation
                    this.handleStickyScroll();
                },

                updateMeasurements() {
                    const sidebar = this.$refs.sidebar;
                    const mainContent = this.$refs.mainContent;
                    const footer = document.querySelector('footer');

                    if (!sidebar || !mainContent) return;

                    this.sidebarHeight = sidebar.offsetHeight;
                    this.mainContentHeight = mainContent.offsetHeight;
                    this.sidebarOffset = sidebar.offsetTop;
                    this.windowHeight = window.innerHeight;

                    // We still get footer position for reference but focus on the main content bottom alignment
                    if (footer) {
                        this.footerHeight = footer.offsetHeight;
                        this.footerOffset = this.getOffsetTop(footer);
                    }
                },

                // Helper to get offset from document top (since offsetTop is only relative to parent)
                getOffsetTop(element) {
                    let offsetTop = 0;
                    while (element) {
                        offsetTop += element.offsetTop;
                        element = element.offsetParent;
                    }
                    return offsetTop;
                },

                handleStickyScroll() {
                    // Skip sticky behavior on mobile
                    if (this.isMobile) {
                        this.position = 'relative';
                        this.top = 0;
                        return;
                    }

                    const scrollY = window.scrollY;
                    const mainContentBottom = this.$refs.mainContent.offsetTop + this.mainContentHeight;
                    const viewportBottom = scrollY + this.windowHeight;
                    const sidebarBottom = scrollY + this.initialTopOffset + this.sidebarHeight;

                    // Calculate when sidebar should stop (to align with the last line of content)
                    // For aligning with main content bottom:
                    const stopPosition = mainContentBottom - this.sidebarHeight;

                    // If sidebar is shorter than viewport, make it sticky with content alignment
                    if (this.sidebarHeight < (this.windowHeight - this.initialTopOffset)) {
                        // If we've scrolled past the main content boundary
                        if (scrollY > stopPosition) {
                            this.position = 'absolute';
                            this.top = mainContentBottom - this.sidebarHeight - this.sidebarOffset + this.initialTopOffset;
                        }
                        // If we're past the initial sidebar position
                        else if (scrollY > this.sidebarOffset - this.initialTopOffset) {
                            this.position = 'fixed';
                            this.top = this.initialTopOffset;
                        }
                        // At the top of the page
                        else {
                            this.position = 'relative';
                            this.top = 0;
                        }
                    }
                    // If sidebar is taller than viewport
                    else {
                        // If we've scrolled to where the bottom of sidebar would align with main content
                        if (scrollY + this.sidebarHeight + this.initialTopOffset > mainContentBottom) {
                            this.position = 'absolute';
                            this.top = mainContentBottom - this.sidebarHeight - this.sidebarOffset;
                        }
                        // If we're within normal scrolling range
                        else if (scrollY > this.sidebarOffset - this.initialTopOffset) {
                            this.position = 'fixed';
                            this.top = this.initialTopOffset;
                        }
                        // At the top of the page
                        else {
                            this.position = 'relative';
                            this.top = 0;
                        }
                    }
                }
            }
        }
    </script>
</body>

</html>
