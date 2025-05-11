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

        /* Hero section fix */
        .hero-section {
            padding-top: 4rem;
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

        <main class="relative z-10 bg-white hero-section">
            <!-- About Section -->
            <section class="py-10">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center bg-white">
                        <h2 class="text-4xl font-bold text-gray-900">About <span class="text-amber-500">Sugarahen</span>
                        </h2>
                        <p class="mt-4 text-gray-600 max-w-3xl mx-auto">
                            At Sugarahen, we specialize in premium coconut and palm sugar products crafted
                            from the finest Indonesian coconut and palm sap. Committed to sustainability, we deliver
                            natural sweetness to customers worldwide, tailored to meet diverse culinary and
                            industrial needs.
                    </div>
                </div>
            </section>

            <div class="relative border-b border-gray-150">
                <!-- Video Background -->
                <div class="relative max-w-4xl mx-auto mb-16">
                    <div class="rounded-xl overflow-hidden shadow-lg">
                        <video class="w-full aspect-video object-cover" autoplay muted loop>
                            <source src="/video/pabrik.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <!-- Overlay to ensure text readability -->
                        <div class="absolute inset-0 bg-black/10"></div>
                    </div>
                </div>
            </div>

            <section class="py-16 border-b border-gray-150">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <!-- Heading moved above both columns -->
                    <div class="text-center mb-8">
                        <h2 class="text-4xl font-bold text-gray-900">Our <span class="text-amber-500">Story</span></h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 md:gap-7">
                        <div class="flex items-center justify-center p-2">
                            <!-- Image container with adjusted display properties -->
                            <div class="rounded-xl overflow-hidden shadow-xl w-full">
                                <img src="/img/ahen.png" alt="Coconut Sugar Production"
                                    class="w-full object-contain h-auto">
                            </div>
                        </div>
                        <div class="space-y-4 flex flex-col justify-center mt-6 md:mt-0">
                            <p class="text-gray-700 text-lg leading-relaxed text-justify">
                                <span class="font-bold">Sugarahen</span> is a leading exporter of premium organic sugar
                                products from Indonesia.
                                We partner with local farmers to ensure sustainable farming, ethical sourcing, and
                                top-quality products. Every step—from harvest to packaging—is carefully managed to
                                deliver natural taste and meet global standards, while also supporting environmental
                                responsibility and local communities.
                            </p>
                            <p class="text-gray-700 text-lg leading-relaxed text-justify">
                                Our strong commitment to quality, sustainability, and fair trade has made us a trusted
                                partner for food manufacturers, distributors, and retailers worldwide. With a focus on
                                long-term collaboration, Sugar Ahen provides reliable, ethical sweetener solutions for
                                the global market.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Mission & Vision Section - Restructured for mobile layout -->
            <section class="py-12 md:py-20 border-b border-gray-150">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-14">
                        <!-- Vision Section -->
                        <div class="space-y-4 md:space-y-6">
                            <h2 class="text-3xl font-bold text-gray-900">Our <span class="text-amber-500">Vision</span>
                            </h2>
                            <p class="text-gray-700 leading-relaxed text-justify">
                                We envision a world where natural, sustainable sweeteners are the preferred choice
                                for consumers and manufacturers, contributing to better health outcomes and
                                environmental sustainability.
                            </p>
                        </div>
                        <!-- Mission Section -->
                        <div class="space-y-4 md:space-y-6">
                            <h2 class="text-3xl font-bold text-gray-900">Our <span class="text-amber-500">Mission</span>
                            </h2>
                            <p class="text-gray-700 leading-relaxed text-justify">
                                At Sugar Ahen, our mission is to provide high-quality organic sugar
                                products while supporting sustainable agricultural practices and improving
                                the livelihoods of local farmers in Indonesia.
                            </p>
                        </div>
                    </div>

                    <!-- Factory image - Mobile: between mission and vision, Desktop: below both -->
                    <div class="mt-8 md:mt-12">
                        <!-- On mobile, this appears between Mission and Vision with reduced margins -->
                        <div class="md:hidden my-6">
                            <div class="rounded-xl overflow-hidden shadow-xl">
                                <img src="/img/pabrik.jpg" alt="Coconut Sugar Farmers"
                                    class="w-full object-cover h-[200px]">
                            </div>
                        </div>

                        <!-- On desktop, this appears below both Mission and Vision -->
                        <div class="hidden md:block max-w-4xl mx-auto">
                            <div class="rounded-xl overflow-hidden shadow-xl">
                                <img src="/img/pabrik.jpg" alt="Coconut Sugar Farmers"
                                    class="w-full object-cover max-h-[400px]">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Values Section -->
            <section class="py-12 md:py-16 bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-8 md:mb-10">
                        <h2 class="text-4xl font-bold text-gray-900">Our <span class="text-amber-500">Values</span></h2>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8 mb-2">
                        <div class="bg-white rounded-lg p-6 md:p-8 shadow-md value-card text-center">
                            <div class="text-amber-500 text-4xl mb-4">
                                <i class="fas fa-leaf"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-gray-900">Sustainability</h3>
                            <p class="text-gray-700">We are committed to environmentally sustainable farming and
                                production practices.</p>
                        </div>
                        <div class="bg-white rounded-lg p-6 md:p-8 shadow-md value-card text-center">
                            <div class="text-amber-500 text-4xl mb-4">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-gray-900">Fair Trade</h3>
                            <p class="text-gray-700">We ensure fair compensation and good working conditions for all our
                                farmers.</p>
                        </div>
                        <div class="bg-white rounded-lg p-6 md:p-8 shadow-md value-card text-center">
                            <div class="text-amber-500 text-4xl mb-4">
                                <i class="fas fa-award"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-3 text-gray-900">Quality</h3>
                            <p class="text-gray-700">We maintain the highest standards of quality in all our products.
                            </p>
                        </div>
                        <div class="bg-white rounded-lg p-6 md:p-8 shadow-md value-card text-center">
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
            <section class="py-12 md:py-20 bg-amber-500">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 md:mb-6">Want to Learn More?</h2>
                    <p class="md:text-xl text-white mb-6 md:mb-8 max-w-3xl mx-auto">Contact us today to discuss
                        how we can meet
                        your coconut or palm sugar needs.</p>
                    <a href="/contact"
                        class="inline-flex items-center px-6 md:px-8 py-3 bg-white hover:bg-gray-100 text-amber-500 font-medium rounded-full transition-colors text-lg">
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
