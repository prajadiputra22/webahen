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
    <title>Our Products - Sugar Ahen</title>
    <style>
        /* Product card styling */
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Packaging card styling */
        .packaging-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .packaging-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Certification card styling */
        .certification-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .certification-card:hover {
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

        <main class="relative z-10 bg-white mt-10">
            <!-- Products Introduction -->
            <section class="py-16">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h2 class="text-4xl font-bold text-gray-900">Premium <span class="text-amber-500">Coconut & Palm Sugar</span></h2>
                        <p class="mt-4 text-gray-600 max-w-3xl mx-auto">
                            We offer a wide range of high-quality coconut and palm sugar products to meet the diverse 
                            needs of our customers around the world. All our products are made from the finest 
                            coconut and palm sap, harvested sustainably from Indonesian coconut palms.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Products Section -->
            <section class="py-5 border-b border-gray-150">
                <x-product></x-product>
            </section>

            <!-- Packaging Options -->
            {{-- <section class="py-16 border-b border-gray-150">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-14">
                        <h2 class="text-4xl font-bold text-gray-900">Packaging <span class="text-amber-500">Options</span></h2>
                        <p class="mt-4 text-gray-600 max-w-3xl mx-auto">We offer various packaging options to meet your specific requirements</p>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div class="bg-white rounded-xl overflow-hidden shadow-md packaging-card">
                            <img src="https://via.placeholder.com/300x200" alt="Retail Packaging" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Retail Packaging</h3>
                                <p class="text-gray-600">Available in 250g, 500g, and 1kg packages</p>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl overflow-hidden shadow-md packaging-card">
                            <img src="https://via.placeholder.com/300x200" alt="Bulk Packaging" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Bulk Packaging</h3>
                                <p class="text-gray-600">Available in 5kg, 10kg, and 25kg bags</p>
                            </div>
                        </div>
                        <div class="bg-white rounded-xl overflow-hidden shadow-md packaging-card">
                            <img src="https://via.placeholder.com/300x200" alt="Custom Packaging" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Custom Packaging</h3>
                                <p class="text-gray-600">Private label and custom packaging solutions available</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}

            <!-- Certifications -->
            <section class="py-16">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-14">
                        <h2 class="text-4xl font-bold text-gray-900">Our <span class="text-amber-500">Certifications</span></h2>
                    </div>
                    <div class="grid sm:grid-cols-3 gap-6">
                        {{-- <div class="bg-white rounded-xl p-6 text-center shadow-md certification-card">
                            <img src="img\certificate\usda.jpeg" alt="Organic Certification" class="w-24 h-24 mx-auto mb-4">
                            <h3 class="text-lg font-bold text-gray-900">USDA Organic</h3>
                        </div> --}}
                        <div class="bg-white rounded-xl p-6 text-center shadow-md certification-card">
                            <img src="img\certificate\bpom.jpeg" alt="EU Organic" class="w-24 h-24 mx-auto mb-4">
                            <h3 class="text-lg font-bold text-gray-900">BPOM Certificated</h3>
                        </div>
                        <div class="bg-white rounded-xl p-6 text-center shadow-md certification-card">
                            <img src="img\certificate\halal.jpeg" alt="Halal" class="w-24 h-24 mx-auto mb-4">
                            <h3 class="text-lg font-bold text-gray-900">HALAL Certified</h3>
                        </div>
                        <div class="bg-white rounded-xl p-6 text-center shadow-md certification-card">
                            <img src="img\certificate\sni.png" alt="SNI" class="w-24 h-24 mx-auto mb-4">
                            <h3 class="text-lg font-bold text-gray-900">SNI Certified</h3>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="py-16 bg-amber-500">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h2 class="text-4xl font-bold text-white mb-6">Ready to Order Premium Coconut & Palm Sugar?</h2>
                    <p class="text-xl text-white mb-8 max-w-3xl mx-auto">Contact our team today to discuss your coconut sugar needs.</p>
                    <a href="/contact"
                        class="inline-flex items-center px-8 py-3 bg-white hover:bg-gray-100 text-amber-500 font-medium rounded-full transition-colors text-lg">
                        Request a Quote
                        <i class="fas fa-chevron-right ml-2"></i>
                    </a>
                </div>
            </section>
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
