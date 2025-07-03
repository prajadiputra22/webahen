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
    <title>Our Products - Sugarahen</title>
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
                        <h2 class="text-4xl font-bold text-gray-900 animate-slide-up" data-animate>
                            Premium <span class="text-amber-500">Coconut & Palm Sugar</span>
                        </h2>
                        <p class="mt-4 text-gray-600 max-w-3xl mx-auto animate-slide-up animate-delay-200" data-animate>
                            We offer a wide range of high-quality coconut and palm sugar products to meet the diverse 
                            needs of our customers around the world. All our products are made from the finest 
                            coconut and palm sap, harvested sustainably from Indonesian coconut palms.
                        </p>
                    </div>
                </div>
            </section>

            <!-- Products Section -->
            <section class="py-5 border-b border-gray-150 animate-fade-in animate-delay-300" data-animate>
                <x-product></x-product>
            </section>

            <!-- Certifications -->
            <section class="py-16">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-14">
                        <h2 class="text-4xl font-bold text-gray-900 animate-slide-up" data-animate>
                            Our <span class="text-amber-500">Certifications</span>
                        </h2>
                    </div>
                    <div class="grid sm:grid-cols-3 gap-6">
                        <div class="bg-white rounded-xl p-6 text-center shadow-md certification-card animate-slide-up animate-delay-100" data-animate>
                            <img src="img\certificate\bpom.jpeg" alt="EU Organic" class="w-24 h-24 mx-auto mb-4">
                            <h3 class="text-lg font-bold text-gray-900">BPOM Certificated</h3>
                        </div>
                        <div class="bg-white rounded-xl p-6 text-center shadow-md certification-card animate-slide-up animate-delay-200" data-animate>
                            <img src="img\certificate\halal.jpeg" alt="Halal" class="w-24 h-24 mx-auto mb-4">
                            <h3 class="text-lg font-bold text-gray-900">HALAL Certified</h3>
                        </div>
                        <div class="bg-white rounded-xl p-6 text-center shadow-md certification-card animate-slide-up animate-delay-300" data-animate>
                            <img src="img\certificate\sni.png" alt="SNI" class="w-24 h-24 mx-auto mb-4">
                            <h3 class="text-lg font-bold text-gray-900">SNI Certified</h3>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="py-16 bg-amber-500">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-fade-in animate-delay-300" data-animate>
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