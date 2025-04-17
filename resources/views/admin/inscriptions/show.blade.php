@extends('admin.layouts.app')

@section('title', 'Détails de l\'inscription')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Fil d'Ariane et bouton de retour -->
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-gray-500 hover:text-indigo-600">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Tableau de bord
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('admin.inscriptions.index') }}" class="ml-1 text-gray-500 hover:text-indigo-600 md:ml-2">Inscriptions</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-gray-500 md:ml-2 font-medium">Détails de l'inscription #{{ $inscription->id }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h1 class="text-2xl font-bold text-gray-800 mt-2">Détails de l'inscription</h1>
        </div>
        
        <div class="flex space-x-3">
            <a href="{{ route('admin.inscriptions.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-md transition-colors duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                </svg>
                Retour
            </a>
            <a href="{{ route('admin.inscriptions.edit', $inscription) }}" class="inline-flex items-center px-4 py-2 bg-yellow-100 hover:bg-yellow-200 text-yellow-800 text-sm font-medium rounded-md transition-colors duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
                Modifier
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm fade-out-alert" role="alert">
            <div class="flex items-center">
                <svg class="h-6 w-6 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Informations de l'inscription -->
        <div class="md:col-span-2 space-y-6">
            <!-- Statut et date -->
            <div class="flex flex-col sm:flex-row justify-between sm:items-center bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex items-center mb-4 sm:mb-0">
                    <div class="mr-4">
                        @if($inscription->estEnAttente())
                            <span class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100">
                                <svg class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                        @elseif($inscription->estConfirmee())
                            <span class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                                <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                        @elseif($inscription->estAnnulee())
                            <span class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </span>
                        @endif
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Statut de l'inscription</p>
                        <p class="text-lg font-semibold">
                            @if($inscription->estEnAttente())
                                <span class="text-yellow-700">En attente</span>
                            @elseif($inscription->estConfirmee())
                                <span class="text-green-700">Confirmée</span>
                            @elseif($inscription->estAnnulee())
                                <span class="text-red-700">Annulée</span>
                            @endif
                        </p>
                    </div>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Date d'inscription</p>
                    <p class="text-lg font-semibold">
                        @if($inscription->created_at)
                            {{ $inscription->created_at->format('d/m/Y à H:i') }}
                        @else
                            Date inconnue
                        @endif
                    </p>
                </div>
            </div>
            
            <!-- Informations personnelles -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h2 class="text-lg font-semibold text-gray-800">Informations personnelles</h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-1">Nom complet</p>
                            <p class="text-base">{{ $inscription->getNomComplet() }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-1">Email</p>
                            <a href="mailto:{{ $inscription->email }}" class="text-indigo-600 hover:text-indigo-800 hover:underline">
                                {{ $inscription->email }}
                            </a>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-1">Téléphone</p>
                            <a href="tel:{{ $inscription->contact }}" class="text-indigo-600 hover:text-indigo-800 hover:underline">
                                {{ $inscription->contact }}
                            </a>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-1">Profession</p>
                            <p class="text-base">{{ $inscription->profession ?: 'Non spécifiée' }}</p>
                        </div>
                        @if($inscription->ville || $inscription->pays)
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-1">Localisation</p>
                            <p class="text-base">
                                @if($inscription->ville)
                                    {{ $inscription->ville }}
                                @endif
                                @if($inscription->ville && $inscription->pays)
                                    ,
                                @endif
                                @if($inscription->pays)
                                    {{ $inscription->pays }}
                                @endif
                            </p>
                        </div>
                        @endif
                    </div>
                    
                    @if($inscription->commentaire)
                    <div class="mt-6 pt-6 border-t border-gray-100">
                        <p class="text-sm font-medium text-gray-500 mb-2">Commentaire</p>
                        <div class="bg-gray-50 p-4 rounded-md text-gray-700">
                            {{ $inscription->commentaire }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            
            <!-- Détails de la formation -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h2 class="text-lg font-semibold text-gray-800">Détails de la formation</h2>
                </div>
                <div class="p-6">
                    <div class="flex items-start">
                        @if($inscription->formation->image)
                        <div class="flex-shrink-0 mr-4">
                            <img src="{{ asset('storage/' . $inscription->formation->image) }}" alt="{{ $inscription->formation->titre }}" class="h-24 w-24 object-cover rounded-md">
                        </div>
                        @endif
                        <div class="flex-1">
                            <h3 class="text-xl font-semibold text-gray-900">{{ $inscription->formation->titre }}</h3>
                            <p class="text-sm text-gray-500 mt-1">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                    {{ $inscription->formation->categorie->nom }}
                                </span>
                                <span class="ml-2">{{ $inscription->formation->duree_jours }} jours | {{ $inscription->formation->prix_formatted }}</span>
                            </p>
                            <div class="mt-4">
                                <div class="flex flex-col sm:flex-row sm:space-x-6">
                                    <div class="mb-3 sm:mb-0">
                                        <p class="text-xs text-gray-500">Date de début</p>
                                        <p class="font-medium">
                                            @if($inscription->formation->date_debut)
                                                {{ $inscription->formation->date_debut->format('d/m/Y') }}
                                            @else
                                                Non définie
                                            @endif
                                        </p>
                                    </div>
                                    <div class="mb-3 sm:mb-0">
                                        <p class="text-xs text-gray-500">Places disponibles</p>
                                        <p class="font-medium">{{ $inscription->formation->places_disponibles }} places</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500">Localisation</p>
                                        <p class="font-medium">{{ $inscription->formation->lieu ?: 'En ligne' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 pt-6 border-t border-gray-100">
                        <p class="text-sm font-medium text-gray-500 mb-2">Description</p>
                        <div class="text-gray-700 prose prose-sm max-w-none">
                            {!! $inscription->formation->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sidebar avec actions et historique -->
        <div class="space-y-6">
            <!-- Actions -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h2 class="text-lg font-semibold text-gray-800">Actions</h2>
                </div>
                <div class="p-6 space-y-4">
                    @if($inscription->estEnAttente())
                    <form action="{{ route('admin.inscriptions.confirmer', $inscription) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full flex justify-center items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md transition-colors duration-150">
                            <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Confirmer l'inscription
                        </button>
                    </form>
                    @endif
                    
                    @if(!$inscription->estAnnulee())
                    <form action="{{ route('admin.inscriptions.annuler', $inscription) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full flex justify-center items-center px-4 py-2 bg-red-100 hover:bg-red-200 text-red-800 text-sm font-medium rounded-md transition-colors duration-150">
                            <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Annuler l'inscription
                        </button>
                    </form>
                    @endif
                    
                    <a href="{{ route('admin.inscriptions.edit', $inscription) }}" class="w-full flex justify-center items-center px-4 py-2 bg-yellow-100 hover:bg-yellow-200 text-yellow-800 text-sm font-medium rounded-md transition-colors duration-150">
                        <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                        Modifier les informations
                    </a>
                    
                    <form action="{{ route('admin.inscriptions.destroy', $inscription) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette inscription ? Cette action est irréversible.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full flex justify-center items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-md transition-colors duration-150">
                            <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Historique -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h2 class="text-lg font-semibold text-gray-800">Historique</h2>
                </div>
                <div class="p-6">
                    <div class="flow-root">
                        <ul class="-mb-8">
                            <li>
                                <div class="relative pb-8">
                                    <span class="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                    <div class="relative flex items-start space-x-3">
                                        <div class="relative">
                                            <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center ring-8 ring-white">
                                                <svg class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <div>
                                                <p class="text-sm text-gray-500">Création de l'inscription</p>
                                                <p class="mt-0.5 text-sm text-gray-500">
                                                    @if($inscription->created_at)
                                                        {{ $inscription->created_at->format('d/m/Y à H:i') }}
                                                    @else
                                                        Date inconnue
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            
                            @if($inscription->updated_at > $inscription->created_at)
                            <li>
                                <div class="relative pb-8">
                                    <span class="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                    <div class="relative flex items-start space-x-3">
                                        <div class="relative">
                                            <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center ring-8 ring-white">
                                                <svg class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <div>
                                                <p class="text-sm text-gray-500">Mise à jour des informations</p>
                                                <p class="mt-0.5 text-sm text-gray-500">
                                                    @if($inscription->updated_at)
                                                        {{ $inscription->updated_at->format('d/m/Y à H:i') }}
                                                    @else
                                                        Date inconnue
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endif
                            
                            <li>
                                <div class="relative">
                                    <div class="relative flex items-start space-x-3">
                                        <div class="relative">
                                            <div class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center ring-8 ring-white">
                                                <svg class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <div>
                                                <p class="text-sm text-gray-500">État actuel</p>
                                                <p class="mt-0.5 text-sm font-medium">
                                                    @if($inscription->estEnAttente())
                                                        <span class="text-yellow-700">En attente de confirmation</span>
                                                    @elseif($inscription->estConfirmee())
                                                        <span class="text-green-700">Inscription confirmée</span>
                                                    @elseif($inscription->estAnnulee())
                                                        <span class="text-red-700">Inscription annulée</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Suggestions -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h2 class="text-lg font-semibold text-gray-800">Formations similaires</h2>
                </div>
                <div class="p-6">
                    @if($formationsSimilaires && $formationsSimilaires->count() > 0)
                        <ul class="divide-y divide-gray-200">
                            @foreach($formationsSimilaires as $formation)
                                <li class="py-3 @if(!$loop->first) pt-3 @endif @if(!$loop->last) pb-3 @endif">
                                    <a href="{{ route('admin.formations.show', $formation) }}" class="hover:bg-gray-50 flex rounded-md -m-3 p-3 transition duration-150 ease-in-out">
                                        <div class="flex-shrink-0">
                                            @if($formation->image)
                                                <img class="h-10 w-10 rounded-md object-cover" src="{{ asset('storage/' . $formation->image) }}" alt="{{ $formation->titre }}">
                                            @else
                                                <div class="h-10 w-10 rounded-md bg-indigo-100 flex items-center justify-center">
                                                    <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $formation->titre }}</div>
                                            <div class="text-xs text-gray-500">
                                                {{ $formation->categorie->nom }} | {{ $formation->prix_formatted }}
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <div class="text-center py-4 text-gray-500">
                            <p>Aucune formation similaire disponible</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-disparition des alertes après 5 secondes
        const alerts = document.querySelectorAll('.fade-out-alert');
        if (alerts.length > 0) {
            setTimeout(() => {
                alerts.forEach(alert => {
                    alert.style.opacity = '0';
                    alert.style.transition = 'opacity 1s';
                    setTimeout(() => {
                        alert.remove();
                    }, 1000);
                });
            }, 5000);
        }
    });
</script>
@endpush
@endsection 