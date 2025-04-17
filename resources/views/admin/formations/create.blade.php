@extends('admin.layouts.app')

@section('title', 'Ajouter une formation')
@section('header', 'Ajouter une formation')

@section('content')
<div class="container mx-auto">
    <div class="bg-white rounded-lg">
        <div class="p-6 border-b">
            <h2 class="text-lg font-medium text-gray-800">Nouvelle formation</h2>
        </div>
        
        <div class="p-6">
            <form action="{{ route('admin.formations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Affichage des erreurs -->
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Titre -->
                    <div class="md:col-span-2">
                        <label for="titre" class="block text-sm font-medium text-gray-700 mb-1">Titre <span class="text-red-600">*</span></label>
                        <input type="text" name="titre" id="titre" value="{{ old('titre') }}" required
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    </div>
                    
                    <!-- Catégorie -->
                    <div>
                        <label for="categorie_id" class="block text-sm font-medium text-gray-700 mb-1">Catégorie <span class="text-red-600">*</span></label>
                        <select name="categorie_id" id="categorie_id" required
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                            <option value="">Sélectionner une catégorie</option>
                            @foreach($categories as $categorie)
                                <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                                    {{ $categorie->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Durée -->
                    <div>
                        <label for="duree_jours" class="block text-sm font-medium text-gray-700 mb-1">Durée (jours) <span class="text-red-600">*</span></label>
                        <input type="number" name="duree_jours" id="duree_jours" value="{{ old('duree_jours') }}" min="1" required
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    </div>
                    
                    <!-- Prix -->
                    <div>
                        <label for="prix" class="block text-sm font-medium text-gray-700 mb-1">Prix (FCFA) <span class="text-red-600">*</span></label>
                        <input type="number" name="prix" id="prix" value="{{ old('prix', 0) }}" min="0" required
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                        <p class="text-xs text-gray-500 mt-1">Saisir 0 pour une formation gratuite</p>
                    </div>
                    
                    <!-- Image -->
                    <div class="md:col-span-2">
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                        <input type="file" name="image" id="image" accept="image/*"
                               class="w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                        <p class="text-xs text-gray-500 mt-1">Formats acceptés: JPG, PNG, GIF (max 2Mo)</p>
                    </div>
                    
                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description <span class="text-red-600">*</span></label>
                        <textarea name="description" id="description" rows="3" required
                                  class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">{{ old('description') }}</textarea>
                    </div>
                    
                    <!-- Contenu -->
                    <div class="md:col-span-2">
                        <label for="contenu" class="block text-sm font-medium text-gray-700 mb-1">Contenu détaillé <span class="text-red-600">*</span></label>
                        <textarea name="contenu" id="contenu" rows="6" required
                                  class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">{{ old('contenu') }}</textarea>
                    </div>
                </div>
                
                <div class="mt-6 flex justify-end space-x-3">
                    <a href="{{ route('admin.formations.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded text-sm">
                        Annuler
                    </a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">
                        <i class="fas fa-save mr-1"></i> Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Script pour prévisualiser l'image
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image');
        
        if (imageInput) {
            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        // Créer une prévisualisation ici si nécessaire
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
    });
</script>
@endpush 