@props(['phone' => '6281295133302', 'message' => ''])

<div class="fixed bottom-6 right-6 z-50">
    <a href="https://wa.me/{{ $phone }}?text={{ urlencode($message) }}" target="_blank"
        class="flex items-center justify-center w-14 h-14 rounded-full bg-amber-500 hover:bg-amber-600 shadow-lg transition-all duration-300 hover:scale-110">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
        </svg>
    </a>
</div>

<style>
    /* Animasi ketika halaman dimuat */
    @keyframes bounce-in {
        0% {
            transform: scale(0);
            opacity: 0;
        }

        60% {
            transform: scale(1.1);
            opacity: 1;
        }

        100% {
            transform: scale(1);
        }
    }

    .fixed.bottom-6.right-6 {
        animation: bounce-in 0.5s ease-out;
    }
</style>
