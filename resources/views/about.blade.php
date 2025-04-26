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
    <title>About Us - Sugar Ahen</title>
    <style>
        /* Team member card styling */
        .team-member {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .team-member:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Values card styling */
        .value-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .value-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
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

        <!-- Page Banner -->
        <div class="bg-amber-500 py-20 pb-7">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-4">Sugarahen</h1>
                <p class="text-xl text-white max-w-3xl mx-auto">Learn about our story, mission, and commitment to quality</p>
            </div>
        </div>

        <main class="relative z-10 bg-white">
            <!-- About Section -->
            <section class="py-20">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-14">
                        <div class="rounded-xl overflow-hidden shadow-xl flex items-center">
                            <img src="/img/sugarahen.jpeg" alt="Coconut Sugar Production" class="w-full object-cover">
                        </div>
                        <div class="space-y-8 flex flex-col justify-center">
                            <h2 class="text-3xl font-bold text-gray-900">Our <span class="text-amber-500">Story</span></h2>
                            <p class="text-gray-700 text-lg leading-relaxed text-justify">
                                Sugar Ahen is a leading exporter of premium coconut sugar products from Indonesia.
                                We work directly with local farmers to ensure sustainable farming practices and
                                the highest quality products for our international customers.
                            </p>
                            <p class="text-gray-700 text-lg leading-relaxed text-justify">
                                Our commitment to quality, sustainability, and fair trade has made us a trusted
                                partner for food manufacturers, distributors, and retailers worldwide.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Mission & Vision Section -->
            <section class="py-20 bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-14">
            <div class="space-y-8 order-2 md:order-1 flex flex-col justify-center">
                <h2 class="text-3xl font-bold text-gray-900">Our <span class="text-amber-500">Mission</span></h2>
                <p class="text-gray-700 text-lg leading-relaxed text-justify">
                    At Sugar Ahen, our mission is to provide the highest quality coconut sugar products
                    while supporting sustainable farming practices and improving the livelihoods of
                    local farmers in Indonesia.
                </p>
                <h2 class="text-3xl font-bold text-gray-900 mt-10">Our <span class="text-amber-500">Vision</span></h2>
                <p class="text-gray-700 text-lg leading-relaxed text-justify">
                    We envision a world where natural, sustainable sweeteners are the preferred choice
                    for consumers and manufacturers, contributing to better health outcomes and
                    environmental sustainability.
                </p>
            </div>
            <div class="order-1 md:order-2 flex items-center justify-center md:justify-end">
                <div class="rounded-xl overflow-hidden shadow-xl h-full flex items-center w-full md:w-11/12">
                    <img src="/img/pabrik.jpg" alt="Coconut Sugar Farmers" class="w-full object-cover max-h-[400px]">
                </div>
            </div>
        </div>
    </div>
</section>

            <!-- Values Section -->
            <section class="py-20 bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-14">
                        <h2 class="text-4xl font-bold text-gray-900">Our <span class="text-amber-500">Values</span></h2>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        <div class="bg-white rounded-lg p-8 shadow-md value-card text-center">
                            <div class="text-amber-500 text-4xl mb-4">
                                <i class="fas fa-leaf"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-gray-900">Sustainability</h3>
                            <p class="text-gray-700">We are committed to environmentally sustainable farming and production practices.</p>
                        </div>
                        <div class="bg-white rounded-lg p-8 shadow-md value-card text-center">
                            <div class="text-amber-500 text-4xl mb-4">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-gray-900">Fair Trade</h3>
                            <p class="text-gray-700">We ensure fair compensation and good working conditions for all our farmers.</p>
                        </div>
                        <div class="bg-white rounded-lg p-8 shadow-md value-card text-center">
                            <div class="text-amber-500 text-4xl mb-4">
                                <i class="fas fa-award"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-gray-900">Quality</h3>
                            <p class="text-gray-700">We maintain the highest standards of quality in all our products.</p>
                        </div>
                        <div class="bg-white rounded-lg p-8 shadow-md value-card text-center">
                            <div class="text-amber-500 text-4xl mb-4">
                                <i class="fas fa-users"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-gray-900">Community</h3>
                            <p class="text-gray-700">We invest in the communities where our farmers live and work.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="py-20 bg-amber-500">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h2 class="text-4xl font-bold text-white mb-6">Want to Learn More?</h2>
                    <p class="text-xl text-white mb-8 max-w-3xl mx-auto">Contact us today to discuss how we can meet your coconut sugar needs.</p>
                    <a href="/contact"
                        class="inline-flex items-center px-8 py-3 bg-white hover:bg-gray-100 text-amber-500 font-medium rounded-full transition-colors text-lg">
                        Contact Us
                        <i class="fas fa-chevron-right ml-2"></i>
                    </a>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <x-footer> </x-footer>
        <!-- Komponen Chat WhatsApp -->
        <x-chat></x-chat>
    </div>

    <script>
        // Set current year in footer
        document.getElementById('current-year').textContent = new Date().getFullYear();
    </script>
</body>

</html>
