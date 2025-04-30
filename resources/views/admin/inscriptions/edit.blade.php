@extends('admin.layouts.app')

@section('title', 'Modifier l\'inscription')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Fil d'Ariane et titre -->
    <div class="mb-8">
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
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('admin.inscriptions.show', $inscription) }}" class="ml-1 text-gray-500 hover:text-indigo-600 md:ml-2">Détails #{{ $inscription->id }}</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-gray-500 md:ml-2 font-medium">Modifier</span>
                    </div>
                </li>
            </ol>
        </nav>
        <h1 class="text-2xl font-bold text-gray-800 mt-2">Modifier l'inscription</h1>
    </div>

    <!-- Messages d'erreur -->
    @if($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm" role="alert">
            <div class="flex items-start">
                <svg class="h-6 w-6 text-red-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <div>
                    <p class="font-medium">Veuillez corriger les erreurs suivantes :</p>
                    <ul class="mt-1 list-disc list-inside text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <!-- Formulaire d'édition -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-800">Informations de l'inscription</h2>
            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                @if($inscription->estEnAttente()) bg-yellow-100 text-yellow-800 @endif
                @if($inscription->estConfirmee()) bg-green-100 text-green-800 @endif
                @if($inscription->estAnnulee()) bg-red-100 text-red-800 @endif">
                @if($inscription->estEnAttente()) En attente @endif
                @if($inscription->estConfirmee()) Confirmée @endif
                @if($inscription->estAnnulee()) Annulée @endif
            </span>
        </div>
        
        <form action="{{ route('admin.inscriptions.update', $inscription) }}" method="POST" class="p-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <!-- Section Formation -->
                <div class="md:col-span-2 bg-gray-50 p-4 rounded-lg border border-gray-200 mb-2">
                    <h3 class="font-medium text-gray-800 mb-3">Formation sélectionnée</h3>
                    <div class="flex items-center">
                        @if($inscription->formation->image)
                            <img src="{{ asset('storage/' . $inscription->formation->image) }}" alt="{{ $inscription->formation->titre }}" class="h-16 w-16 object-cover rounded-md mr-4">
                        @else
                            <div class="h-16 w-16 bg-indigo-100 rounded-md flex items-center justify-center mr-4">
                                <svg class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                        @endif
                        <div>
                            <p class="font-medium">{{ $inscription->formation->titre }}</p>
                            <p class="text-sm text-gray-500">{{ $inscription->formation->categorie->nom }} | {{ $inscription->formation->prix_formatted }}</p>
                            
                            <a href="{{ route('admin.formations.show', $inscription->formation) }}" class="inline-flex items-center text-xs text-indigo-600 hover:text-indigo-800 mt-1">
                                <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                </svg>
                                Voir les détails de la formation
                            </a>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <label for="formation_id" class="block text-sm font-medium text-gray-700">Changer de formation</label>
                        <select id="formation_id" name="formation_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @foreach($formations as $formation)
                                <option value="{{ $formation->id }}" @if($formation->id === $inscription->formation_id) selected @endif>
                                    {{ $formation->titre }} ({{ $formation->categorie->nom }}) - {{ $formation->prix_formatted }}
                                </option>
                            @endforeach
                        </select>
                        <p class="mt-1 text-xs text-gray-500">Changer la formation modifiera également tous les détails associés.</p>
                    </div>
                </div>
                
                <!-- Statut -->
                <div class="space-y-2">
                    <label for="statut" class="block text-sm font-medium text-gray-700">Statut de l'inscription</label>
                    <select id="statut" name="statut" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="en_attente" @if($inscription->statut === 'en_attente') selected @endif>En attente</option>
                        <option value="confirmé" @if($inscription->statut === 'confirmé') selected @endif>Confirmée</option>
                        <option value="annulé" @if($inscription->statut === 'annulé') selected @endif>Annulée</option>
                    </select>
                </div>
                
                <!-- Nom et Prénom -->
                <div class="space-y-2">
                    <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" id="nom" name="nom" value="{{ old('nom', $inscription->nom) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                
                <div class="space-y-2">
                    <label for="prenoms" class="block text-sm font-medium text-gray-700">Prénoms</label>
                    <input type="text" id="prenoms" name="prenoms" value="{{ old('prenoms', $inscription->prenoms) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                
                <!-- Email et Téléphone -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $inscription->email) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                
                <div class="space-y-2">
                    <label for="contact" class="block text-sm font-medium text-gray-700">Numéro de téléphone</label>
                    <input type="text" id="contact" name="contact" value="{{ old('contact', $inscription->contact) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                
                <!-- Profession -->
                <div class="space-y-2">
                    <label for="profession" class="block text-sm font-medium text-gray-700">Profession</label>
                    <input type="text" id="profession" name="profession" value="{{ old('profession', $inscription->profession) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                
                <!-- Ville et Pays -->
                <div class="space-y-2">
                    <label for="ville_id" class="block text-sm font-medium text-gray-700">Ville</label>
                    <select id="ville_id" name="ville_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Sélectionnez une ville</option>
                        @foreach($villes as $ville)
                            <option value="{{ $ville->id }}" {{ old('ville_id', $inscription->ville_id) == $ville->id ? 'selected' : '' }}>
                                {{ $ville->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="space-y-2">
                    <label for="numero_cni" class="block text-sm font-medium text-gray-700">Numéro CNI</label>
                    <input type="text" id="numero_cni" name="numero_cni" value="{{ old('numero_cni', $inscription->numero_cni) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                
                <!-- Commentaire -->
                <div class="md:col-span-2 space-y-2">
                    <label for="commentaire" class="block text-sm font-medium text-gray-700">Commentaire</label>
                    <textarea id="commentaire" name="commentaire" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('commentaire', $inscription->commentaire) }}</textarea>
                    <p class="text-xs text-gray-500">Informations supplémentaires ou notes concernant cette inscription.</p>
                </div>
            </div>
            
            <!-- Actions -->
            <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-3 pt-4 border-t border-gray-200">
                <a href="{{ route('admin.inscriptions.show', $inscription) }}" class="inline-flex justify-center items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-md transition-colors duration-150">
                    Annuler
                </a>
                <button type="submit" class="inline-flex justify-center items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition-colors duration-150">
                    <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Enregistrer les modifications
                </button>
            </div>
        </form>
    </div>
    
    <!-- Autres actions -->
    <div class="mt-8">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center space-y-4 sm:space-y-0">
            <a href="{{ route('admin.inscriptions.show', $inscription) }}" class="inline-flex items-center text-sm text-indigo-600 hover:text-indigo-800">
                <svg class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                Revenir aux détails de l'inscription
            </a>
            
            <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 space-x-0 sm:space-x-3">
                @if($inscription->statut === 'en_attente')
                <form action="{{ route('admin.inscriptions.confirmer', $inscription) }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md transition-colors duration-150">
                        <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Confirmer l'inscription
                    </button>
                </form>
                @endif
                
                @if($inscription->statut !== 'annulé')
                <form action="{{ route('admin.inscriptions.annuler', $inscription) }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-red-100 hover:bg-red-200 text-red-800 text-sm font-medium rounded-md transition-colors duration-150">
                        <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Annuler l'inscription
                    </button>
                </form>
                @endif
                
                <form action="{{ route('admin.inscriptions.destroy', $inscription) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette inscription ? Cette action est irréversible.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-md transition-colors duration-150">
                        <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 