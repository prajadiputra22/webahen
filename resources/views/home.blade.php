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
    <title>Coconut Sugar & Palm Sugar From Indonesia</title>
    <style>
        /* Product card hover effect */
        .product-image {
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.1);
        }

        /* Make product cards clickable with hover effect */
        .product-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            cursor: pointer;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Fix for navbar and hero section */
        body {
            padding-top: 0;
        }

        .hero-section {
            padding-top: 4rem;
        }

        /* Animation Classes */
        .animate-slide-up {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease-out;
        }

        .animate-slide-up.animate-in {
            opacity: 1;
            transform: translateY(0);
        }

        .animate-slide-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: all 0.8s ease-out;
        }

        .animate-slide-left.animate-in {
            opacity: 1;
            transform: translateX(0);
        }

        .animate-slide-right {
            opacity: 0;
            transform: translateX(50px);
            transition: all 0.8s ease-out;
        }

        .animate-slide-right.animate-in {
            opacity: 1;
            transform: translateX(0);
        }

        .animate-fade-in {
            opacity: 0;
            transition: opacity 1s ease-out;
        }

        .animate-fade-in.animate-in {
            opacity: 1;
        }

        /* Staggered animation delays */
        .animate-delay-100 { transition-delay: 0.1s; }
        .animate-delay-200 { transition-delay: 0.2s; }
        .animate-delay-300 { transition-delay: 0.3s; }
        .animate-delay-400 { transition-delay: 0.4s; }
        .animate-delay-500 { transition-delay: 0.5s; }
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

        <!-- Hero Section with proper spacing -->
        <div class="hero-section">
            <x-slider></x-slider>
        </div>

        <main class="relative z-10 bg-white">
            <!-- About Section -->
            <section id="about" class="py-16 border-b border-gray-150">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-8">
                        <h2 class="text-4xl font-bold text-gray-900 animate-slide-up" data-animate>
                            About <span class="text-amber-500">Sugarahen</span>
                        </h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-14 items-center">
                        <div class="w-30 h-30 rounded-xl overflow-hidden shadow-xl animate-slide-up animate-delay-200" data-animate>
                            <img src="/img/ahen.png" alt="Coconut Sugar Production" class="w-30 h-30 object-contain">
                        </div>

                        <div class="space-y-8 animate-slide-up animate-delay-300" data-animate>
                            <p class="text-gray-700 text-lg leading-relaxed text-justify">
                                <span class="font-bold">Sugarahen</span> is a leading exporter of premium coconut sugar
                                products from Indonesia.
                                We work directly with local farmers to ensure sustainable farming practices and
                                the highest quality products for our international customers.
                            </p>
                            <p class="text-gray-700 text-lg leading-relaxed text-justify">
                                Our commitment to quality, sustainability, and fair trade has made us a trusted
                                partner for food manufacturers, distributors, and retailers worldwide.
                            </p>
                            <div class="text-center mt-10 animate-fade-in animate-delay-100" data-animate>
                                <a href="/about#story"
                                    class="inline-flex items-center px-8 py-3 bg-amber-500 hover:bg-amber-600 text-white font-medium rounded-full transition-colors text-lg">
                                    Learn More About Us
                                    <i class="fas fa-chevron-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Products Section - Updated to make entire cards clickable -->
            <section id="products" class="py-14 bg-white text-black">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-12 py-12">
                        <h2 class="text-4xl font-bold animate-slide-up" data-animate>
                            Our <span class="text-amber-500">Products</span>
                        </h2>
                        <p class="mt-4 text-gray-600 max-w-2xl mx-auto animate-slide-up animate-delay-200" data-animate>
                            We offer a wide range of high-quality coconut sugar products to meet the diverse
                            needs of our customers around the world.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Product 1 - Entire card is now clickable -->
                        <a href="/products" class="block bg-white rounded-lg overflow-hidden shadow-md product-card animate-slide-up animate-delay-200" data-animate>
                            <div class="h-64 overflow-hidden">
                                <img src="/img/palmsugar.jpeg" alt="Granulated Coconut Sugar"
                                    class="w-full h-full object-contain product-image">
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">Granulated Coconut Sugar</h3>
                                <p class="text-gray-600 mb-4 text-justify">
                                    Made from high quality genuine Indonesian palm sap, it produces natural sugar that
                                    is good for the body.
                                </p>
                            </div>
                        </a>

                        <!-- Product 2 - Entire card is now clickable -->
                        <a href="/products" class="block bg-white rounded-lg overflow-hidden shadow-md product-card animate-slide-up animate-delay-300" data-animate>
                            <div class="h-64 overflow-hidden">
                                <img src="/img/coconutsugar.jpeg" alt="Coconut Sugar Blocks"
                                    class="w-full h-full object-contain product-image">
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">Coconut Sugar Blocks</h3>
                                <p class="text-gray-600 mb-4 text-justify">
                                    Traditional coconut sugar blocks with intense flavor, ideal for traditional cooking
                                    and specialty dishes.
                                </p>
                            </div>
                        </a>

                        <!-- Product 3 - Entire card is now clickable -->
                        <a href="/products" class="block bg-white rounded-lg overflow-hidden shadow-md product-card animate-slide-up animate-delay-400" data-animate>
                            <div class="h-64 overflow-hidden">
                                <img src="/img/liquidsugar.jpeg" alt="Liquid Palm Sugar"
                                    class="w-full h-full object-contain product-image">
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2">Liquid Palm Sugar</h3>
                                <p class="text-gray-600 mb-4 text-justify">
                                    Our liquid palm sugar syrup is a versatile sweetener with a rich caramel flavor,
                                    perfect for drizzling.
                                </p>
                            </div>
                        </a>
                    </div>

                    <div class="text-center py-12 animate-fade-in animate-delay-100" data-animate>
                        <a href="/products"
                            class="inline-flex items-center px-6 py-3 bg-amber-500 hover:bg-amber-600 text-white font-medium rounded-full transition-colors">
                            View Details Products
                            <i class="fas fa-chevron-right ml-2"></i>
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

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, observerOptions);

        // Observe all elements with data-animate attribute
        document.addEventListener('DOMContentLoaded', () => {
            const animateElements = document.querySelectorAll('[data-animate]');
            animateElements.forEach(el => observer.observe(el));
        });
    </script>
</body>

</html>