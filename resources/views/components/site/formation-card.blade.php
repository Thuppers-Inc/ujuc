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
        <div class="flex justify-between items-center mb-3">
            <span class="bg-orange-100 text-orange-700 text-xs font-medium px-2.5 py-0.5 rounded">
                {{ $formation->categorie->nom }}
            </span>
            @if($formation->duree_jours)
                <span class="text-gray-600 text-sm">{{ $formation->duree_jours }} jours</span>
            @endif
        </div>
        <a href="{{ route('formations.show', $formation->slug) }}" class="block">
            <h3 class="text-xl font-semibold mb-2 text-gray-800 hover:text-orange-500">{{ $formation->titre }}</h3>
        </a>
        <p class="text-gray-600 mb-4">{{ Str::limit($formation->description, 100) }}</p>
        <a href="{{ route('formations.show', $formation->slug) }}" class="bg-orange-500 hover:bg-orange-600 text-white py-2 px-4 w-full inline-block text-center rounded-md transition-colors duration-200">
            Voir les détails
        </a>
    </div>
</div>