@extends('admin.layouts.app')

@section('title', 'Modifier un partenaire')

@section('content')
<div class="container mx-auto px-4 py-6">
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
                            <a href="{{ route('admin.partenaires.index') }}" class="ml-1 text-gray-500 hover:text-indigo-600 md:ml-2">Partenaires</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-gray-500 md:ml-2 font-medium">Modification</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h1 class="text-2xl font-bold text-gray-800 mt-2">Modifier le partenaire</h1>
        </div>
        
        <div>
            <a href="{{ route('admin.partenaires.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-md transition-colors duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                </svg>
                Retour à la liste
            </a>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-800">Formulaire de modification</h2>
            
            <div class="flex items-center">
                <span class="mr-2 text-sm text-gray-600">ID: {{ $partenaire->id }}</span>
                <span class="px-2 py-1 text-xs rounded-full {{ $partenaire->est_actif ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                    {{ $partenaire->est_actif ? 'Actif' : 'Inactif' }}
                </span>
            </div>
        </div>
        
        <form action="{{ route('admin.partenaires.update', $partenaire) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom du partenaire <span class="text-red-600">*</span></label>
                <input type="text" name="nom" id="nom" value="{{ old('nom', $partenaire->nom) }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('nom')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500">Le nom sera automatiquement converti en slug.</p>
            </div>
            
            <div class="mb-6">
                <label for="site_web" class="block text-sm font-medium text-gray-700 mb-1">Site Web <span class="text-red-600">*</span></label>
                <input type="url" name="site_web" id="site_web" value="{{ old('site_web', $partenaire->site_web) }}" required placeholder="https://exemple.com" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('site_web')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description', $partenaire->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500">Une brève description de ce partenaire (optionnel).</p>
            </div>
            
            <div class="mb-6">
                <label for="logo" class="block text-sm font-medium text-gray-700 mb-1">Logo</label>
                
                @if($partenaire->logo)
                <div class="mb-3 p-2 border rounded-md flex items-center">
                    <div class="flex-shrink-0 h-16 w-16 bg-gray-100 rounded flex items-center justify-center mr-3">
                        <img src="{{ $partenaire->getLogoUrl() }}" alt="{{ $partenaire->nom }}" class="max-h-14 max-w-14 object-contain">
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Logo actuel</p>
                        <p class="text-xs text-gray-500">Remplacez-le en sélectionnant un nouveau fichier ci-dessous</p>
                    </div>
                </div>
                @endif
                
                <input type="file" name="logo" id="logo" accept="image/*" class="w-full bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                @error('logo')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500">Format recommandé: PNG ou JPG, max 2MB. Dimension idéale: 200x100px.</p>
                
                @if($partenaire->logo)
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="supprimer_logo" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <span class="ml-2 text-sm text-gray-600">Supprimer le logo actuel</span>
                    </label>
                </div>
                @endif
            </div>
            
            <div class="mb-6">
                <label for="ordre" class="block text-sm font-medium text-gray-700 mb-1">Ordre d'affichage</label>
                <input type="number" name="ordre" id="ordre" value="{{ old('ordre', $partenaire->ordre) }}" min="0" class="w-32 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('ordre')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500">L'ordre d'affichage (0 = premier)</p>
            </div>
            
            <div class="mb-6">
                <div class="flex items-center">
                    <input type="checkbox" name="est_actif" id="est_actif" value="1" {{ old('est_actif', $partenaire->est_actif) ? 'checked' : '' }} class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="est_actif" class="ml-2 block text-sm text-gray-700">Partenaire actif</label>
                </div>
                <p class="mt-1 text-xs text-gray-500 ml-6">Les partenaires inactifs ne seront pas affichés sur le site public.</p>
            </div>
            
            <div class="flex justify-end space-x-3">
                <a href="{{ route('admin.partenaires.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-md transition-colors duration-150">
                    Annuler
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                    <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Enregistrer les modifications
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 