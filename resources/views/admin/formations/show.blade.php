@extends('admin.layouts.app')

@section('title', $formation->titre)
@section('header', 'Détails de la formation')

@section('content')
<div class="container mx-auto">
    <div class="mb-6">
        <a href="{{ route('admin.formations.index') }}" class="text-blue-600 hover:underline text-sm">
            <i class="fas fa-arrow-left mr-1"></i> Retour à la liste
        </a>
    </div>
    
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Informations principales -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg">
                <div class="p-6 flex justify-between items-center border-b">
                    <h2 class="text-lg font-medium text-gray-800">{{ $formation->titre }}</h2>
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.formations.edit', $formation) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">
                            <i class="fas fa-edit mr-1"></i> Modifier
                        </a>
                        <form action="{{ route('admin.formations.destroy', $formation) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded text-sm" 
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette formation ?')">
                                <i class="fas fa-trash mr-1"></i> Supprimer
                            </button>
                        </form>
                    </div>
                </div>
                
                <div class="p-6">
                    <!-- Image -->
                    @if($formation->hasImage())
                        <div class="mb-6">
                            <img src="{{ $formation->getImageUrl() }}" alt="{{ $formation->titre }}" 
                                 class="w-full h-64 object-cover rounded-lg">
                        </div>
                    @endif
                    
                    <!-- Informations de base -->
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <p class="text-sm text-gray-600">Catégorie</p>
                            <p class="font-medium">{{ $formation->categorie->nom }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Durée</p>
                            <p class="font-medium">{{ $formation->duree_jours }} jour(s)</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Prix</p>
                            <p class="font-medium">
                                @if($formation->prix == 0)
                                    <span class="text-green-600">Gratuit</span>
                                @else
                                    {{ number_format($formation->prix, 0, ',', ' ') }} FCFA
                                @endif
                            </p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Slug</p>
                            <p class="font-medium">{{ $formation->slug }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Date de création</p>
                            <p class="font-medium">{{ $formation->created_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                    
                    <!-- Description -->
                    <div class="mb-6">
                        <h3 class="text-md font-semibold text-gray-800 mb-2">Description</h3>
                        <p class="text-gray-700">{{ $formation->description }}</p>
                    </div>
                    
                    <!-- Contenu détaillé -->
                    <div>
                        <h3 class="text-md font-semibold text-gray-800 mb-2">Contenu détaillé</h3>
                        <div class="prose max-w-none text-gray-700">
                            {!! nl2br(e($formation->contenu)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Inscriptions récentes -->
        <div>
            <div class="bg-white rounded-lg">
                <div class="p-6 border-b">
                    <h2 class="text-lg font-medium text-gray-800">Inscriptions récentes</h2>
                </div>
                
                <div class="p-6">
                    @if(isset($inscriptions) && $inscriptions->count() > 0)
                        <div class="space-y-4">
                            @foreach($inscriptions as $inscription)
                                <div class="border-b border-gray-100 pb-4 last:border-0 last:pb-0">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-500">
                                            {{ strtoupper(substr($inscription->nom, 0, 1)) }}
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-800">{{ $inscription->getNomComplet() }}</p>
                                            <p class="text-xs text-gray-500">{{ $inscription->created_at->format('d/m/Y') }}</p>
                                        </div>
                                        <div class="ml-auto">
                                            @if($inscription->estEnAttente())
                                                <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-600">En attente</span>
                                            @elseif($inscription->estConfirmee())
                                                <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-600">Confirmée</span>
                                            @else
                                                <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-600">Annulée</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="mt-4 text-right">
                            <a href="{{ route('admin.inscriptions.index', ['formation_id' => $formation->id]) }}" class="text-sm text-blue-600 hover:underline">
                                Voir toutes les inscriptions <i class="fas fa-arrow-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-gray-100 text-gray-400 mb-4">
                                <i class="fas fa-users text-xl"></i>
                            </div>
                            <p class="text-gray-500">Aucune inscription pour cette formation</p>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Prévisualisation publique -->
            <div class="mt-6 bg-white rounded-lg">
                <div class="p-6 border-b">
                    <h2 class="text-lg font-medium text-gray-800">Actions</h2>
                </div>
                
                <div class="p-6">
                    <a href="{{ route('formations.show', $formation) }}" target="_blank" class="flex items-center text-blue-600 hover:underline">
                        <i class="fas fa-eye mr-2"></i>
                        <span>Voir sur le site public</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 