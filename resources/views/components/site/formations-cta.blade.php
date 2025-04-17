@props(['title' => 'Une question sur nos formations ?', 'text' => 'N\'hésitez pas à nous contacter pour obtenir plus d\'informations sur nos programmes de formation et sur les modalités d\'inscription.'])

<section class="py-16 bg-gray-100 relative">
    <div class="container mx-auto px-4 max-w-4xl text-center pb-12">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">{{ $title }}</h2>
        <p class="text-xl mb-8 text-gray-600">{{ $text }}</p>
        
        @if(isset($slot) && $slot->isNotEmpty())
            {{ $slot }}
        @else
            <a href="{{ route('contact') }}" class="bg-orange-500 hover:bg-orange-600 text-white py-3 px-6 inline-block rounded-md font-medium transition-colors duration-200">
                Contactez-nous
            </a>
        @endif
    </div>
    
    <!-- Forme d'onde SVG pour la transition - ajustée pour éliminer l'espace -->
    <div class="absolute bottom-0 left-0 w-full" style="line-height: 0;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" preserveAspectRatio="none" class="w-full" style="display: block;">
            <path fill="var(--secondary)" fill-opacity="1" d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,58.7C960,64,1056,64,1152,58.7C1248,53,1344,43,1392,37.3L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
        </svg>
    </div>
</section>