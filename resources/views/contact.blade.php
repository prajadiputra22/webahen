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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <!-- Contact Information -->
            <section class="py-16">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h2 class="text-4xl font-bold text-gray-900">Contact <span
                                class="text-amber-500">Sugarahen</span></h2>
                        <p class="mt-4 text-gray-600 max-w-3xl mx-auto">
                            Get in touch with Sugarahen for premium coconut and palm sugar products
                            tailored to your global needs.We proudly offer sustainably sourced sugar
                            made from the finest Indonesian coconut and palm sap.
                        </p>
                    </div>
                </div>
            </section>

            <section class=" py-5 border-b border-gray-150">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="bg-white rounded-xl p-8 text-center shadow-md contact-card">
                            <div
                                class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-envelope text-amber-500 text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Email Address</h3>
                            <p class="text-gray-600">ahensugar75@gmail.com</p>
                        </div>
                        <div class="bg-white rounded-xl p-8 text-center shadow-md contact-card">
                            <div
                                class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-map-marker-alt text-amber-500 text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Our Address</h3>
                            <p class="text-gray-600">Jl. Baros No. 122</p>
                            <p class="text-gray-600">Sukabumi City, West Java</p>
                            <p class="text-gray-600">Indonesia 43166</p>
                        </div>
                        <div class="bg-white rounded-xl p-8 text-center shadow-md contact-card">
                            <div
                                class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-phone-alt text-amber-500 text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-3">Phone Number</h3>
                            <p class="text-gray-600">+62 812 9513 3302</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact Form Section -->
            <section class="py-16 border-b border-gray-150" id="contact-form-section">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                        <div class="bg-white rounded-xl p-8 shadow-md">
                            <div class="mb-8">
                                <h2 class="text-3xl font-bold text-gray-900 mb-4">Send Us a <span
                                        class="text-amber-500">Message</span></h2>
                                <p class="text-gray-600">
                                    Fill out the form below to get in touch with our team. We'll respond to your inquiry
                                    as soon as possible.
                                </p>
                            </div>

                            <div id="form-response" class="mb-6 hidden">
                                <!-- Response messages will be inserted here by JavaScript -->
                            </div>

                            <form id="contactForm">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Your
                                            Name</label>
                                        <input type="text" id="name" name="name"
                                            placeholder="Enter your name" required
                                            class="w-full px-4 py-2 border rounded-md focus:ring-amber-500 focus:border-amber-500 border-gray-300">
                                        <p class="mt-1 text-sm text-red-600 hidden" id="name-error"></p>
                                    </div>
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Your
                                            Email</label>
                                        <input type="email" id="email" name="email"
                                            placeholder="Enter your email" required
                                            class="w-full px-4 py-2 border rounded-md focus:ring-amber-500 focus:border-amber-500 border-gray-300">
                                        <p class="mt-1 text-sm text-red-600 hidden" id="email-error"></p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div>
                                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone
                                            Number</label>
                                        <input type="tel" id="phone" name="phone"
                                            placeholder="Enter your phone number"
                                            class="w-full px-4 py-2 border rounded-md focus:ring-amber-500 focus:border-amber-500 border-gray-300">
                                        <p class="mt-1 text-sm text-red-600 hidden" id="phone-error"></p>
                                    </div>
                                    <div>
                                        <label for="subject"
                                            class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                                        <input type="text" id="subject" name="subject" placeholder="Enter subject"
                                            class="w-full px-4 py-2 border rounded-md focus:ring-amber-500 focus:border-amber-500 border-gray-300">
                                        <p class="mt-1 text-sm text-red-600 hidden" id="subject-error"></p>
                                    </div>
                                </div>
                                <div class="mb-6">
                                    <label for="product" class="block text-sm font-medium text-gray-700 mb-2">Product
                                        Interest</label>
                                    <select id="product" name="product" required
                                        class="w-full px-4 py-2 border rounded-md focus:ring-amber-500 focus:border-amber-500 border-gray-300">
                                        <option value="" disabled selected>Select a product</option>
                                        <option value="granulated-coconut-sugar">Granulated Coconut Sugar</option>
                                        <option value="coconut-sugar-blocks">Coconut Sugar Blocks</option>
                                        <option value="liquid-palm-sugar">Liquid Palm Sugar</option>
                                        <option value="other-products">Other Products</option>
                                    </select>
                                    <p class="mt-1 text-sm text-red-600 hidden" id="product-error"></p>
                                </div>
                                <div class="mb-6">
                                    <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Your
                                        Message</label>
                                    <textarea id="message" name="message" placeholder="Enter your message" rows="6" required
                                        class="w-full px-4 py-2 border rounded-md focus:ring-amber-500 focus:border-amber-500 border-gray-300"></textarea>
                                    <p class="mt-1 text-sm text-red-600 hidden" id="message-error"></p>
                                </div>
                                <button type="submit"
                                    class="inline-flex items-center px-6 py-3 bg-amber-500 hover:bg-amber-600 text-white font-medium rounded-md transition-colors">
                                    <span id="submitText">Send Message</span>
                                    <span id="loadingIcon" class="hidden ml-2">
                                        <svg class="animate-spin h-5 w-5 text-white"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                            </path>
                                        </svg>
                                    </span>
                                </button>
                            </form>
                        </div>
                        <div>
                            <div class="bg-white rounded-xl p-6 shadow-md mb-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-4">Business Hours</h3>
                                <ul class="space-y-3">
                                    <li class="flex justify-between">
                                        <span class="font-medium text-gray-700">Monday - Saturday:</span>
                                        <span class="text-gray-600">9:00 AM - 4:00 PM</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span class="font-medium text-gray-700">Sunday:</span>
                                        <span class="text-gray-600">Closed</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="bg-white rounded-xl overflow-hidden shadow-md">
                                <div class="relative w-full h-[580px]">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.2358839845774!2d106.93328159999999!3d-6.956091199999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e684700683526c1%3A0x6844a2d270f9252a!2sWARUNG%20KMS!5e0!3m2!1sen!2sid!4v1714132000000!5m2!1sen!2sid"
                                        width="100%" height="100%"
                                        style="border:0; position: absolute; top: 0; left: 0; width: 100%; height: 100%;"
                                        allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                    <div class="absolute bottom-2 left-2 bg-white px-2 py-1 text-xs rounded shadow">
                                        <a href="https://www.google.com/maps/place/WARUNG+KMS/@-6.9559581,106.9336625,18z/data=!4m6!3m5!1s0x2e684700683526c1:0x6844a2d270f9252a!8m2!3d-6.9560912!4d106.9332816!16s%2Fg%2F11x0_2j4z3"
                                            target="_blank" class="text-blue-600 hover:text-blue-800">
                                            View larger map
                                        </a>
                                    </div>
                                </div>
                                <div class="p-3 bg-amber-50 text-center">
                                    <a href="https://www.google.com/maps/place/WARUNG+KMS/@-6.9559581,106.9336625,18z/data=!4m6!3m5!1s0x2e684700683526c1:0x6844a2d270f9252a!8m2!3d-6.9560912!4d106.9332816!16s%2Fg%2F11x0_2j4z3"
                                        target="_blank"
                                        class="text-amber-500 hover:text-amber-600 font-medium flex items-center justify-center">
                                        <i class="fas fa-directions mr-2"></i> Get Directions
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FAQ Section -->
            <section class="py-16" x-data="{
                activeItem: null,
                toggleItem(index) {
                    this.activeItem = this.activeItem === index ? null : index;
                }
            }">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-14">
                        <h2 class="text-4xl font-bold text-gray-900">Frequently Asked <span
                                class="text-amber-500">Questions</span></h2>
                    </div>
                    <div class="max-w-3xl mx-auto">
                        <div class="space-y-4">
                            <div class="bg-white rounded-xl overflow-hidden shadow-md faq-item"
                                :class="{ 'active': activeItem === 0 }" @click="toggleItem(0)">
                                <div class="p-6 flex justify-between items-center cursor-pointer">
                                    <h3 class="text-lg font-bold text-gray-900">What is the minimum order quantity?
                                    </h3>
                                    <i
                                        class="fas fa-chevron-down text-amber-500 transition-transform duration-300"></i>
                                </div>
                                <div class="px-6 pb-6 faq-answer">
                                    <p class="text-gray-600">
                                        Our minimum order quantity varies by product. For retail packaging, the MOQ is
                                        typically 100 units. For bulk orders, the MOQ starts at 500kg. Please contact us
                                        for specific product MOQs.
                                    </p>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl overflow-hidden shadow-md faq-item"
                                :class="{ 'active': activeItem === 1 }" @click="toggleItem(1)">
                                <div class="p-6 flex justify-between items-center cursor-pointer">
                                    <h3 class="text-lg font-bold text-gray-900">Do you offer samples before ordering?
                                    </h3>
                                    <i
                                        class="fas fa-chevron-down text-amber-500 transition-transform duration-300"></i>
                                </div>
                                <div class="px-6 pb-6 faq-answer">
                                    <p class="text-gray-600">
                                        Yes, we offer samples for all our products. There may be a small fee for
                                        shipping and handling, which can be credited toward your first order.
                                    </p>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl overflow-hidden shadow-md faq-item"
                                :class="{ 'active': activeItem === 2 }" @click="toggleItem(2)">
                                <div class="p-6 flex justify-between items-center cursor-pointer">
                                    <h3 class="text-lg font-bold text-gray-900">What are your shipping terms?</h3>
                                    <i
                                        class="fas fa-chevron-down text-amber-500 transition-transform duration-300"></i>
                                </div>
                                <div class="px-6 pb-6 faq-answer">
                                    <p class="text-gray-600">
                                        We offer various shipping options including FOB, CIF, and DDP. The specific
                                        terms will depend on your location and order size. Our team will work with you
                                        to find the most cost-effective shipping solution.
                                    </p>
                                </div>
                            </div>
                            <div class="bg-white rounded-xl overflow-hidden shadow-md faq-item"
                                :class="{ 'active': activeItem === 3 }" @click="toggleItem(3)">
                                <div class="p-6 flex justify-between items-center cursor-pointer">
                                    <h3 class="text-lg font-bold text-gray-900">Do you offer private labeling?</h3>
                                    <i
                                        class="fas fa-chevron-down text-amber-500 transition-transform duration-300"></i>
                                </div>
                                <div class="px-6 pb-6 faq-answer">
                                    <p class="text-gray-600">
                                        Yes, we offer private labeling and custom packaging solutions for our products.
                                        Please contact our team to discuss your specific requirements.
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
        <!-- Komponen Chat WhatsApp -->
        <x-chat></x-chat>
    </div>

    <script>
        // Set current year in footer
        document.getElementById('current-year').textContent = new Date().getFullYear();

        // AJAX form submission
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            // Show loading indicator
            document.getElementById('submitText').textContent = 'Sending...';
            document.getElementById('loadingIcon').classList.remove('hidden');

            // Reset previous error messages
            document.querySelectorAll('.text-red-600').forEach(el => {
                el.classList.add('hidden');
                el.textContent = '';
            });

            // Reset input borders
            document.querySelectorAll('input, select, textarea').forEach(el => {
                el.classList.remove('border-red-500');
                el.classList.add('border-gray-300');
            });

            // Get form data
            const formData = new FormData(this);

            // Send AJAX request
            fetch('{{ route('contact.send') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Hide loading indicator
                    document.getElementById('submitText').textContent = 'Send Message';
                    document.getElementById('loadingIcon').classList.add('hidden');

                    const responseElement = document.getElementById('form-response');
                    responseElement.classList.remove('hidden');

                    if (data.success) {
                        // Show success message
                        responseElement.className =
                            'mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-md';
                        responseElement.innerHTML = data.message;

                        // Reset form
                        document.getElementById('contactForm').reset();
                    } else {
                        // Show error message
                        responseElement.className =
                            'mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-md';
                        responseElement.innerHTML = data.message ||
                            'There was a problem sending your message. Please try again later.';

                        // Show validation errors if any
                        if (data.errors) {
                            Object.keys(data.errors).forEach(field => {
                                const errorElement = document.getElementById(field + '-error');
                                if (errorElement) {
                                    errorElement.textContent = data.errors[field][0];
                                    errorElement.classList.remove('hidden');
                                }

                                const inputElement = document.getElementById(field);
                                if (inputElement) {
                                    inputElement.classList.remove('border-gray-300');
                                    inputElement.classList.add('border-red-500');
                                }
                            });
                        }
                    }

                    // Scroll to response message (but stay in the form section)
                    responseElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                })
                .catch(error => {
                    // Hide loading indicator
                    document.getElementById('submitText').textContent = 'Send Message';
                    document.getElementById('loadingIcon').classList.add('hidden');

                    // Show error message
                    const responseElement = document.getElementById('form-response');
                    responseElement.classList.remove('hidden');
                    responseElement.className =
                        'mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-md';
                    responseElement.innerHTML =
                        'There was a problem connecting to the server. Please try again later.';

                    console.error('Error:', error);
                });
        });
    </script>
</body>

</html>
