<header class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center">
                <span class="text-2xl font-bold text-custom-primary">Un Jeune Une Compétence</span>
            </a>
            
            <!-- Navigation principale (desktop) -->
            <nav class="hidden md:flex space-x-6">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-custom-primary font-medium">Accueil</a>
                <a href="{{ route('formations.index') }}" class="text-gray-700 hover:text-custom-primary font-medium">Formations</a>
                <a href="#" class="text-gray-700 hover:text-custom-primary font-medium">À propos</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-custom-primary font-medium">Contact</a>
            </nav>
            
            <!-- Bouton de menu mobile -->
            <div class="md:hidden">
                <button type="button" class="text-gray-700 hover:text-custom-primary" id="mobile-menu-button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Menu mobile (initialement caché) -->
        <div class="md:hidden hidden mt-4" id="mobile-menu">
            <nav class="flex flex-col space-y-3">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-custom-primary font-medium py-2">Accueil</a>
                <a href="{{ route('formations.index') }}" class="text-gray-700 hover:text-custom-primary font-medium py-2">Formations</a>
                <a href="#" class="text-gray-700 hover:text-custom-primary font-medium py-2">À propos</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-custom-primary font-medium py-2">Contact</a>
            </nav>
        </div>
    </div>
</header>

@push('scripts')
<script>
    // Toggle mobile menu
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
    });
</script>
@endpush