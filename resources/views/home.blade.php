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
    <title>Sugar Ahen - Premium Coconut Sugar Exporter</title>
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
    <x-navbar></x-navbar>
    <!-- Hero Slider with Alpine.js - Updated with larger images -->
    <div class="relative bg-white h-[100vh] overflow-hidden" x-data="{ 
      currentSlide: 0,
      autoSlideInterval: null,
      slides: [
        {
          tagline: 'BEST QUALITY',
          title: 'COCONUT SUGAR',
          description: 'Premium organic coconut sugar exported worldwide',
          image: '/img/coconutsugar.jpeg'
        },
        {
          tagline: 'PURE ORGANIC',
          title: 'PALM SUGAR',
          description: '100% natural palm sugar with rich caramel flavor',
          image: '/img/palmsugar.jpeg'
        },
        {
          tagline: 'SUSTAINABLE',
          title: 'LIQUID SUGAR',
          description: 'Eco-friendly production process for a better planet',
          image: 'img/liquidsugar.jpeg'
        }
      ],
      startAutoSlide() {
        this.stopAutoSlide();
        this.autoSlideInterval = setInterval(() => {
          this.nextSlide();
        }, 5000);
      },
      stopAutoSlide() {
        if (this.autoSlideInterval) {
          clearInterval(this.autoSlideInterval);
        }
      },
      nextSlide() {
        this.currentSlide = (this.currentSlide + 1) % this.slides.length;
        this.startAutoSlide(); // Reset timer after manual navigation
      },
      prevSlide() {
        this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
        this.startAutoSlide(); // Reset timer after manual navigation
      },
      goToSlide(index) {
        this.currentSlide = index;
        this.startAutoSlide(); // Reset timer after manual navigation
      }
    }"
    x-init="startAutoSlide()">
      <!-- Slides -->
      <template x-for="(slide, index) in slides" :key="index">
        <div 
          class="absolute inset-0 transition-opacity duration-1000 ease-in-out"
          :class="{ 'opacity-0': currentSlide !== index, 'opacity-100': currentSlide === index }"
          x-show="currentSlide === index || currentSlide === (index - 1 + slides.length) % slides.length || currentSlide === (index + 1) % slides.length"
        >
          <!-- Overlay -->
          <div class="absolute inset-0 bg-black opacity-50 z-10"></div>
          
          <!-- Image - Made larger with scale-125 class -->
          <div class="absolute inset-0 flex items-center justify-center">
            <img :src="slide.image" :alt="slide.title" class="w-full h-full object-contain scale-125 z-5">
          </div>
          
          <!-- Content -->
          <div class="absolute inset-0 flex items-center justify-center z-20">
            <div class="text-center px-4 sm:px-6 lg:px-8">
              <!-- Tagline -->
              <span 
                class="text-amber-500 text-base sm:text-lg md:text-xl font-medium tracking-wider uppercase mb-3 block"
                x-text="slide.tagline"
              ></span>
              
              <!-- Title -->
              <h1 
                class="text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-bold text-white mb-6"
                x-text="slide.title"
              ></h1>
              
              <!-- Description -->
              <p 
                class="text-lg sm:text-xl md:text-2xl text-gray-200 max-w-2xl mx-auto"
                x-text="slide.description"
              ></p>
            </div>
          </div>
        </div>
      </template>
      
      <!-- Navigation Arrows -->
      <button 
        @click="prevSlide()" 
        class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center text-white z-30"
      >
        <i class="fas fa-chevron-left"></i>
      </button>
      <button 
        @click="nextSlide()" 
        class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center text-white z-30"
      >
        <i class="fas fa-chevron-right"></i>
      </button>
      
      <!-- Dots Navigation -->
      <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex space-x-2 z-30">
        <template x-for="(slide, index) in slides" :key="index">
          <button 
            @click="goToSlide(index)" 
            class="w-3 h-3 rounded-full transition-colors duration-300"
            :class="currentSlide === index ? 'bg-amber-500' : 'bg-white/50 hover:bg-white/80'"
          ></button>
        </template>
      </div>
    </div>

    <main class="relative z-10 bg-gray-100">
      <!-- About Section -->
      <section id="about" class="py-20 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="text-center mb-14">
            <h2 class="text-4xl font-bold text-gray-900">About <span class="text-amber-500">Sugar Ahen</span></h2>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-14 items-center">
            <div class="rounded-xl overflow-hidden shadow-xl">
              <img src="/img/sugarahen.jpeg" alt="Coconut Sugar Production" class="w-full h-full object-cover">
            </div>
            <div class="space-y-8">
              <p class="text-gray-700 text-lg leading-relaxed">
                Sugar Ahen is a leading exporter of premium coconut sugar products from Indonesia. 
                We work directly with local farmers to ensure sustainable farming practices and 
                the highest quality products for our international customers.
              </p>
              <p class="text-gray-700 text-lg leading-relaxed">
                Our commitment to quality, sustainability, and fair trade has made us a trusted 
                partner for food manufacturers, distributors, and retailers worldwide.
              </p>
              <a href="/about" class="inline-flex items-center px-8 py-3 bg-amber-500 hover:bg-amber-600 text-white font-medium rounded-full transition-colors text-lg">
                Learn More About Us
                <i class="fas fa-chevron-right ml-2"></i>
              </a>
            </div>
          </div>
        </div>
      </section>

      <!-- Products Section - Updated to make entire cards clickable -->
      <section id="products" class="py-16 bg-white text-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="text-center mb-8">
            <h2 class="text-4xl font-bold">Our <span class="text-amber-500">Products</span></h2>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
              We offer a wide range of high-quality coconut sugar products to meet the diverse 
              needs of our customers around the world.
            </p>
          </div>
          
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Product 1 - Entire card is now clickable -->
            <a href="/products" class="block bg-white rounded-lg overflow-hidden shadow-md product-card">
              <div class="h-64 overflow-hidden">
                <img src="/img/palmsugar.jpeg" 
                     alt="Granulated Coconut Sugar" 
                     class="w-full h-full object-contain product-image">
              </div>
              <div class="p-6">
                <h3 class="text-xl font-bold mb-2">Granulated Coconut Sugar</h3>
                <p class="text-gray-600 mb-4">
                  Our premium granulated coconut sugar is perfect for baking, cooking, and as a natural sweetener for beverages.
                </p>
                <div class="inline-flex items-center text-amber-500 font-medium">
                  <span>View Details</span>
                  <i class="fas fa-chevron-right ml-2"></i>
                </div>
              </div>
            </a>
            
            <!-- Product 2 - Entire card is now clickable -->
            <a href="/products" class="block bg-white rounded-lg overflow-hidden shadow-md product-card">
              <div class="h-64 overflow-hidden">
                <img src="/img/coconutsugar.jpeg" 
                     alt="Coconut Sugar Blocks" 
                     class="w-full h-full object-contain product-image">
              </div>
              <div class="p-6">
                <h3 class="text-xl font-bold mb-2">Coconut Sugar Blocks</h3>
                <p class="text-gray-600 mb-4">
                  Traditional coconut sugar blocks with intense flavor, ideal for traditional cooking and specialty dishes.
                </p>
                <div class="inline-flex items-center text-amber-500 font-medium">
                  <span>View Details</span>
                  <i class="fas fa-chevron-right ml-2"></i>
                </div>
              </div>
            </a>
            
            <!-- Product 3 - Entire card is now clickable -->
            <a href="/products" class="block bg-white rounded-lg overflow-hidden shadow-md product-card">
              <div class="h-64 overflow-hidden">
                <img src="/img/liquidsugar.jpeg" 
                     alt="Liquid Coconut Sugar" 
                     class="w-full h-full object-contain product-image">
              </div>
              <div class="p-6">
                <h3 class="text-xl font-bold mb-2">Liquid Coconut Sugar</h3>
                <p class="text-gray-600 mb-4">
                  Our liquid coconut sugar syrup is a versatile sweetener with a rich caramel flavor, perfect for drizzling.
                </p>
                <div class="inline-flex items-center text-amber-500 font-medium">
                  <span>View Details</span>
                  <i class="fas fa-chevron-right ml-2"></i>
                </div>
              </div>
            </a>
          </div>
          
          <div class="text-center mt-10">
            <a href="/products" class="inline-flex items-center px-6 py-3 bg-amber-500 hover:bg-amber-600 text-white font-medium rounded-full transition-colors">
              View All Products
              <i class="fas fa-chevron-right ml-2"></i>
            </a>
          </div>
        </div>
      </section>
    </main>

    <x-footer></x-footer>

  </div>
  
  <script>
    // Set current year in footer
    document.getElementById('current-year').textContent = new Date().getFullYear();
  </script>
</body>
</html>
