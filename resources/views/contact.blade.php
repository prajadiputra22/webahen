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
    <title>Contact Us - Sugar Ahen</title>
    <style>
        /* Contact card styling */
        .contact-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* FAQ item styling */
        .faq-item {
            transition: all 0.3s ease;
        }
        
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }
        
        .faq-item.active .faq-answer {
            max-height: 500px;
        }
        
        .faq-item.active .fa-chevron-down {
            transform: rotate(180deg);
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
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-4">Contact <span class="text-gray-900">Us</span></h1>
                <p class="text-xl text-white max-w-3xl mx-auto">Get in touch with our team</p>
            </div>
        </div>

        <main class="relative z-10 bg-white">
            <!-- Contact Information -->
            <section class="py-16">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="bg-white rounded-xl p-8 text-center shadow-md contact-card">
                            <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-map-marker-alt text-amber-500 text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Our Address</h3>
                            <p class="text-gray-600">Jl. Raya Sukabumi No. 123</p>
                            <p class="text-gray-600">Bandung, West Java</p>
                            <p class="text-gray-600">Indonesia 40123</p>
                        </div>
                        <div class="bg-white rounded-xl p-8 text-center shadow-md contact-card">
                            <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-phone-alt text-amber-500 text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Phone Number</h3>
                            <p class="text-gray-600">+62 123 4567 890</p>
                            <p class="text-gray-600">+62 098 7654 321</p>
                        </div>
                        <div class="bg-white rounded-xl p-8 text-center shadow-md contact-card">
                            <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-envelope text-amber-500 text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Email Address</h3>
                            <p class="text-gray-600">info@sugarahen.com</p>
                            <p class="text-gray-600">sales@sugarahen.com</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact Form Section -->
            <section class="py-16 bg-gray-50">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                        <div class="bg-white rounded-xl p-8 shadow-md">
                            <div class="mb-8">
                                <h2 class="text-3xl font-bold text-gray-900 mb-4">Send Us a <span class="text-amber-500">Message</span></h2>
                                <p class="text-gray-600">
                                    Fill out the form below to get in touch with our team. We'll respond to your inquiry as soon as possible.
                                </p>
                            </div>
                            <form>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Your Name</label>
                                        <input type="text" id="name" placeholder="Enter your name" required
                                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-amber-500 focus:border-amber-500">
                                    </div>
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Your Email</label>
                                        <input type="email" id="email" placeholder="Enter your email" required
                                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-amber-500 focus:border-amber-500">
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div>
                                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                        <input type="tel" id="phone" placeholder="Enter your phone number"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-amber-500 focus:border-amber-500">
                                    </div>
                                    <div>
                                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                                        <input type="text" id="subject" placeholder="Enter subject"
                                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-amber-500 focus:border-amber-500">
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label for="product" class="block text-sm font-medium text-gray-700 mb-2">Product Interest</label>
                                    <select id="product" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-amber-500 focus:border-amber-500">
                                        <option value="" disabled selected>Select a product</option>
                                        <option value="granulated">Granulated Coconut Sugar</option>
                                        <option value="blocks">Coconut Sugar Blocks</option>
                                        <option value="liquid">Liquid Coconut Sugar</option>
                                        <option value="organic">Organic Certified Sugar</option>
                                        <option value="other">Other Products</option>
                                    </select>
                                </div>
                                <div class="mb-6">
                                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Your Message</label>
                                    <textarea id="message" placeholder="Enter your message" rows="6" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-amber-500 focus:border-amber-500"></textarea>
                                </div>
                                <button type="submit" 
                                    class="inline-flex items-center px-6 py-3 bg-amber-500 hover:bg-amber-600 text-white font-medium rounded-md transition-colors">
                                    Send Message
                                </button>
                            </form>
                        </div>
                        <div>
                            <div class="bg-white rounded-xl overflow-hidden shadow-md mb-6">
                                <img src="https://via.placeholder.com/600x500" alt="Map Location" class="w-full h-64 object-cover">
                            </div>
                            <div class="bg-white rounded-xl p-6 shadow-md">
                                <h3 class="text-xl font-bold text-gray-900 mb-4">Business Hours</h3>
                                <ul class="space-y-3">
                                    <li class="flex justify-between">
                                        <span class="font-medium text-gray-700">Monday - Friday:</span>
                                        <span class="text-gray-600">9:00 AM - 5:00 PM</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span class="font-medium text-gray-700">Saturday:</span>
                                        <span class="text-gray-600">9:00 AM - 1:00 PM</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span class="font-medium text-gray-700">Sunday:</span>
                                        <span class="text-gray-600">Closed</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FAQ Section -->
            <section class="py-16 bg-white" x-data="{
                activeItem: null,
                toggleItem(index) {
                    this.activeItem = this.activeItem === index ? null : index;
                }
            }">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-14">
                        <h2 class="text-4xl font-bold text-gray-900">Frequently Asked <span class="text-amber-500">Questions</span></h2>
                    </div>
                    <div class="max-w-3xl mx-auto">
                        <div class="space-y-4">
                            <div class="bg-white rounded-xl overflow-hidden shadow-md faq-item" 
                                :class="{'active': activeItem === 0}"
                                @click="toggleItem(0)">
                                <div class="p-6 flex justify-between items-center cursor-pointer">
                                    <h3 class="text-lg font-bold text-gray-900">What is the minimum order quantity?</h3>
                                    <i class="fas fa-chevron-down text-amber-500 transition-transform duration-300"></i>
                                </div>
                                <div class="px-6 pb-6 faq-answer">
                                    <p class="text-gray-600">
                                        Our minimum order quantity varies by product. For retail packaging, the MOQ is typically 100 units. For bulk orders, the MOQ starts at 500kg. Please contact us for specific product MOQs.
                                    </p>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl overflow-hidden shadow-md faq-item"
                                :class="{'active': activeItem === 1}"
                                @click="toggleItem(1)">
                                <div class="p-6 flex justify-between items-center cursor-pointer">
                                    <h3 class="text-lg font-bold text-gray-900">Do you offer samples before ordering?</h3>
                                    <i class="fas fa-chevron-down text-amber-500 transition-transform duration-300"></i>
                                </div>
                                <div class="px-6 pb-6 faq-answer">
                                    <p class="text-gray-600">
                                        Yes, we offer samples for all our products. There may be a small fee for shipping and handling, which can be credited toward your first order.
                                    </p>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl overflow-hidden shadow-md faq-item"
                                :class="{'active': activeItem === 2}"
                                @click="toggleItem(2)">
                                <div class="p-6 flex justify-between items-center cursor-pointer">
                                    <h3 class="text-lg font-bold text-gray-900">What are your shipping terms?</h3>
                                    <i class="fas fa-chevron-down text-amber-500 transition-transform duration-300"></i>
                                </div>
                                <div class="px-6 pb-6 faq-answer">
                                    <p class="text-gray-600">
                                        We offer various shipping options including FOB, CIF, and DDP. The specific terms will depend on your location and order size. Our team will work with you to find the most cost-effective shipping solution.
                                    </p>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl overflow-hidden shadow-md faq-item"
                                :class="{'active': activeItem === 3}"
                                @click="toggleItem(3)">
                                <div class="p-6 flex justify-between items-center cursor-pointer">
                                    <h3 class="text-lg font-bold text-gray-900">Do you offer private labeling?</h3>
                                    <i class="fas fa-chevron-down text-amber-500 transition-transform duration-300"></i>
                                </div>
                                <div class="px-6 pb-6 faq-answer">
                                    <p class="text-gray-600">
                                        Yes, we offer private labeling and custom packaging solutions for our products. Please contact our team to discuss your specific requirements.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
