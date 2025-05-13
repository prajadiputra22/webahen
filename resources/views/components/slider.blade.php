<!-- Mobile Hero Section (visible on small screens only) -->
<div class="md:hidden relative bg-amber-400 w-full overflow-hidden" style="height: 250px;">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0">
        <img src="/img/sugar.jpeg" alt="Coconut Sugar" class="w-full h-full object-cover object-center opacity-30">
    </div>

    <!-- Content -->
    <div class="relative z-10 flex flex-col justify-center h-full">
        <div class="container mx-auto px-6">
            <div class="max-w-md">
                <h1 class="text-3xl font-bold text-white leading-tight">
                    Coconut sugar<br>&amp; Palm sugar
                </h1>
                <p class="text-sm text-white mt-2 mb-4">
                    Made from high quality genuine Indonesian palm sap, it produces natural sugar that is good for
                    the body.
                </p>
                <div class="mt-3">
                    <a href="/contact#contactForm"
                        class="inline-block px-6 py-2 bg-white text-amber-600 font-medium rounded-full hover:bg-gray-100 transition-colors text-sm">
                        Order Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Desktop Hero Section (visible on medium screens and up) -->
<div class="hidden md:block relative bg-amber-400 w-full overflow-hidden" style="height: 80vh; min-height: 600px;">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0">
        <img src="/img/sugar.jpeg" alt="Coconut Sugar" class="w-full h-full object-cover object-center opacity-30">
    </div>

    <!-- Content -->
    <div class="relative z-10 flex flex-col justify-center h-full">
        <div class="container mx-auto px-12">
            <div class="max-w-2xl">
                <h1 class="text-5xl lg:text-6xl font-bold text-white leading-tight">
                    Coconut sugar<br>&amp; Palm sugar
                </h1>
                <p class="text-lg lg:text-xl text-white mt-4 mb-6 max-w-xl">
                    Made from high quality genuine Indonesian<br>
                    coconut sap and palm sap, it produces<br>
                    natural sugar that is good for the body.<br>
                </p>
                <div class="mt-6">
                    <a href="/contact#contactForm"
                        class="inline-block px-8 py-3 bg-white text-amber-600 font-medium rounded-full hover:bg-gray-100 transition-colors text-base">
                        Order Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="relative bg-white h-[100vh] overflow-hidden" x-data="{ 
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
  </div> --}}
