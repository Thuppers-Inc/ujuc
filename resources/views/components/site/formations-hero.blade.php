@props(['title', 'description' => null])

<section class="relative bg-gradient-to-r from-orange-500 to-orange-600 text-white py-16 overflow-hidden">
    <!-- Motif de points -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle, rgba(255,255,255,0.2) 1px, transparent 1px); background-size: 20px 20px;"></div>
    </div>
    
    <!-- Cercles décoratifs -->
    <div class="absolute top-12 left-12 w-32 h-32 bg-white opacity-10 rounded-full"></div>
    <div class="absolute bottom-16 right-16 w-48 h-48 bg-white opacity-10 rounded-full"></div>
    
    <div class="container mx-auto px-4 text-center relative z-10">
        <div class="p-8 md:p-12">
            <h1 class="text-4xl font-bold mb-4 text-white">{{ $title }}</h1>
            
            @if($description)
                <p class="text-xl max-w-3xl mx-auto text-white">{{ $description }}</p>
            @endif
            
            @if(isset($slot) && $slot->isNotEmpty())
                <div class="mt-8">
                    {{ $slot }}
                </div>
            @endif
        </div>
    </div>
</section>