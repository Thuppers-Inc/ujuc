@extends('admin.layouts.app')

@section('title', 'Gestion des formations')
@section('header', 'Gestion des formations')

@section('content')
<div class="container mx-auto">
    <div class="bg-white rounded-lg">
        <div class="p-6 flex justify-between items-center border-b">
            <h2 class="text-lg font-medium text-gray-800">Liste des formations</h2>
            <a href="{{ route('admin.formations.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm">
                <i class="fas fa-plus mr-1"></i> Ajouter une formation
            </a>
        </div>
        
        <div class="p-6">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif
            
            @if($formations->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <th class="px-4 py-3">Image</th>
                                <th class="px-4 py-3">Titre</th>
                                <th class="px-4 py-3">Catégorie</th>
                                <th class="px-4 py-3">Durée</th>
                                <th class="px-4 py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($formations as $formation)
                                <tr>
                                    <td class="px-4 py-4">
                                        <img src="{{ $formation->getImageUrl() }}" alt="{{ $formation->titre }}" class="h-12 w-12 object-cover rounded">
                                    </td>
                                    <td class="px-4 py-4">
                                        <p class="text-sm font-medium text-gray-800">{{ $formation->titre }}</p>
                                        <p class="text-xs text-gray-500 mt-1">{{ Str::limit($formation->description, 50) }}</p>
                                    </td>
                                    <td class="px-4 py-4">
                                        <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-800">
                                            {{ $formation->categorie->nom }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-4">
                                        <p class="text-sm text-gray-700">{{ $formation->duree_jours }} jour(s)</p>
                                    </td>
                                    <td class="px-4 py-4 text-right space-x-2 whitespace-nowrap">
                                        <a href="{{ route('admin.formations.show', $formation) }}" class="text-blue-600 hover:underline text-sm">
                                            <i class="fas fa-eye"></i> Voir
                                        </a>
                                        <a href="{{ route('admin.formations.edit', $formation) }}" class="text-amber-600 hover:underline text-sm ml-2">
                                            <i class="fas fa-edit"></i> Modifier
                                        </a>
                                        <form action="{{ route('admin.formations.destroy', $formation) }}" method="POST" class="inline ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline text-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette formation ?')">
                                                <i class="fas fa-trash"></i> Supprimer
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-10">
                    <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-gray-100 text-gray-400 mb-4">
                        <i class="fas fa-graduation-cap text-xl"></i>
                    </div>
                    <p class="text-gray-500">Aucune formation n'a été créée</p>
                    <p class="text-sm text-gray-400 mt-1">Créez votre première formation en cliquant sur le bouton "Ajouter une formation"</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection 