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
    <link rel="icon" type="image/png" sizes="32x32" href="/img/ahen.png">
    <title>@yield('title') | Sugar Ahen</title>
    <style>
        body {
            padding-top: 4rem;
        }

        .hero-section {
            padding-top: 10rem;
        }

        .error-number {
            font-size: 10rem;
            font-weight: bold;
            line-height: 1.2;
            color: #2d3748;
            overflow: visible;
            margin-top: 4rem;
        }

        @media (max-width: 768px) {
            .error-number {
                font-size: 6rem;
            }
            
            h1.text-4xl {
                font-size: 1.5rem;
            }
            
            p.text-xl {
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .error-number {
                font-size: 4rem;
                margin-top: 2rem;
            }
        }

        .error-number .accent {
            display: inline-block;
            background-color: #f59e0b;
            color: white;
            border-radius: 50%;
            width: 1em;
            height: 1em;
            text-align: center;
        }

        .error-container {
            min-height: 70vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>
</head>

<body class="h-full">

    <div class="min-h-full" x-data="{
        lastScrollTop: 0,
        showNavbar: true,
        handleScroll() {
            let st = window.pageYOffset || document.documentElement.scrollTop;
            if (st > this.lastScrollTop && st > 60) {
                // Scrolling down
                this.showNavbar = false;
            } else {
                // Scrolling up or at top
                this.showNavbar = true;
            }
            this.lastScrollTop = st <= 0 ? 0 : st;
        }
    }" x-init="window.addEventListener('scroll', () => handleScroll());
    showNavbar = true;">

        <!-- Navbar Component -->
        <x-navbar></x-navbar>

        <main class="relative z-10 bg-white">
            <!-- Error Section -->
            <section class="py-18 pb-20 border-b border-gray-150">
                <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center error-container">
                    <div class="mb-10">
                        <div class="error-number">
                            @yield('error-code')
                        </div>
                        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-900 mt-6">@yield('message')</h1>
                        <p class="text-base md:text-lg lg:text-xl text-gray-600 mt-4 max-w-2xl mx-auto">
                            @yield('description')
                        </p>
                    </div>

                    <div class="flex flex-col items-center justify-center space-y-6 mb-12">
                        <a href="/"
                            class="inline-flex items-center px-8 py-3 bg-amber-500 hover:bg-amber-600 text-white font-medium rounded-full transition-colors text-lg">
                            <i class="fas fa-home mr-2"></i>
                            Back to Homepage
                        </a>
                    </div>
                </div>
            </section>
        </main>

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
