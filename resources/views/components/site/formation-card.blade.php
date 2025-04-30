@props(['formation'])

<div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:-translate-y-1 hover:shadow-lg">
    <a href="{{ route('formations.show', $formation->slug) }}">
        <img 
            src="{{ $formation->getImageUrl() }}" 
            alt="{{ $formation->titre }}" 
            class="w-full h-48 object-cover"
            onerror="this.onerror=null; this.src='{{ asset('img/default-formation.jpg') }}'"
        >
    </a>
    
    <div class="p-6">
        <!-- En-tête avec la catégorie et le statut de complétude -->
        <div class="flex justify-between items-center mb-3">
            <span class="bg-orange-100 text-orange-700 text-xs font-medium px-2.5 py-0.5 rounded">
                {{ $formation->categorie->nom }}
            </span>
            
            @if($formation->isComplet())
                <span class="bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                    Complet
                </span>
            @elseif($formation->isPresqueComplet())
                <span class="bg-amber-100 text-amber-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                    Presque complet
                </span>
            @endif
        </div>
        
        <!-- Badges format et niveau -->
        <div class="flex flex-wrap gap-2 mb-3">
            <span class="{{ $formation->getFormatBgColor() }} text-xs font-medium px-2.5 py-0.5 rounded flex items-center gap-1">
                <i class="fas {{ $formation->getFormatIcon() }}"></i>
                {{ ucfirst($formation->format) }}
            </span>
            
            <span class="{{ $formation->getNiveauBgColor() }} text-xs font-medium px-2.5 py-0.5 rounded flex items-center gap-1">
                <i class="fas {{ $formation->getNiveauIcon() }}"></i>
                Niveau {{ ucfirst($formation->niveau_requis) }}
            </span>
        </div>
        
        <!-- Indicateur de complétude -->
        <div class="w-full bg-gray-200 rounded-full h-1.5 mb-3">
            <div class="bg-orange-500 h-1.5 rounded-full" style="width: {{ $formation->getTauxOccupation() }}%"></div>
        </div>
        
        <a href="{{ route('formations.show', $formation->slug) }}" class="block">
            <h3 class="text-xl font-semibold mb-2 text-gray-800 hover:text-orange-500">{{ $formation->titre }}</h3>
        </a>
        
        <p class="text-gray-600 mb-4">{{ Str::limit($formation->description, 100) }}</p>
        
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center text-sm">
                <i class="fas fa-users text-orange-500 mr-2"></i>
                <span class="text-gray-600">{{ $formation->getPlacesDisponibles() - $formation->getInscriptionsConfirmees() }} places restantes</span>
            </div>
            
            <span class="font-bold text-orange-500">
                @if($formation->prix == 0)
                    Gratuit
                @else
                    {{ number_format($formation->prix, 0, ',', ' ') }} FCFA
                @endif
            </span>
        </div>
        
        <a href="{{ route('formations.show', $formation->slug) }}" class="bg-orange-500 hover:bg-orange-600 text-white py-2 px-4 w-full inline-block text-center rounded-md transition-colors duration-200">
            Voir les détails
        </a>
    </div>
</div>