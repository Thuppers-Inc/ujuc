@extends('admin.layouts.app')

@section('title', 'Tableau de bord')
@section('header', 'Tableau de bord')

@section('content')
<div class="container mx-auto">
    <!-- Résumé des statistiques -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        <!-- Total des inscriptions -->
        <div class="bg-white p-6 rounded-lg">
            <div class="flex items-center mb-2">
                <div class="text-gray-800">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="text-gray-500 text-sm ml-2">Total des inscriptions</h3>
            </div>
            <div class="mt-2">
                <div class="text-2xl font-semibold text-gray-800">{{ $totalInscriptions }}</div>
                <div class="text-xs text-gray-500 mt-1">personnes</div>
            </div>
        </div>
        
        <!-- Inscriptions en attente -->
        <div class="bg-white p-6 rounded-lg">
            <div class="flex items-center mb-2">
                <div class="text-gray-800">
                    <i class="fas fa-clock"></i>
                </div>
                <h3 class="text-gray-500 text-sm ml-2">Inscriptions en attente</h3>
            </div>
            <div class="mt-2">
                <div class="text-2xl font-semibold text-gray-800">{{ $inscriptionsEnAttente }}</div>
                <div class="text-xs text-gray-500 mt-1">à traiter</div>
            </div>
        </div>
        
        <!-- Inscriptions confirmées -->
        <div class="bg-white p-6 rounded-lg">
            <div class="flex items-center mb-2">
                <div class="text-gray-800">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3 class="text-gray-500 text-sm ml-2">Inscriptions confirmées</h3>
            </div>
            <div class="mt-2">
                <div class="text-2xl font-semibold text-gray-800">{{ $inscriptionsConfirmees }}</div>
                <div class="text-xs text-gray-500 mt-1">validées</div>
            </div>
        </div>
        
        <!-- Formations -->
        <div class="bg-white p-6 rounded-lg">
            <div class="flex items-center mb-2">
                <div class="text-gray-800">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3 class="text-gray-500 text-sm ml-2">Formations</h3>
            </div>
            <div class="mt-2">
                <div class="text-2xl font-semibold text-gray-800">{{ $totalFormations }}</div>
                <div class="text-xs text-gray-500 mt-1">disponibles</div>
            </div>
        </div>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Inscriptions récentes -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg">
                <div class="p-6 border-b">
                    <h2 class="text-lg font-medium text-gray-800">Inscriptions récentes</h2>
                </div>
                
                <div class="p-6">
                    @if($inscriptionsRecentes->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <th class="px-4 py-3">Nom</th>
                                        <th class="px-4 py-3">Formation</th>
                                        <th class="px-4 py-3">Statut</th>
                                        <th class="px-4 py-3 text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($inscriptionsRecentes as $inscription)
                                        <tr>
                                            <td class="px-4 py-4">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-500">
                                                        {{ strtoupper(substr($inscription->nom, 0, 1)) }}
                                                    </div>
                                                    <div class="ml-3">
                                                        <p class="text-sm font-medium text-gray-800">{{ $inscription->getNomComplet() }}</p>
                                                        <p class="text-xs text-gray-500">{{ $inscription->created_at->format('d/m/Y') }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4">
                                                <p class="text-sm text-gray-700">{{ Str::limit($inscription->formation->titre, 30) }}</p>
                                            </td>
                                            <td class="px-4 py-4">
                                                @if($inscription->estEnAttente())
                                                    <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-600">En attente</span>
                                                @elseif($inscription->estConfirmee())
                                                    <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-600">Confirmée</span>
                                                @else
                                                    <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-600">Annulée</span>
                                                @endif
                                            </td>
                                            <td class="px-4 py-4 text-right">
                                                <a href="{{ route('admin.inscriptions.show', $inscription) }}" class="text-sm text-blue-600 hover:underline">
                                                    Voir détails
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-6 text-right">
                            <a href="{{ route('admin.inscriptions.index') }}" class="text-sm text-blue-600 hover:underline">
                                Tout voir <i class="fas fa-arrow-right ml-1 text-xs"></i>
                            </a>
                        </div>
                    @else
                        <div class="text-center py-10">
                            <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-gray-100 text-gray-400 mb-4">
                                <i class="fas fa-inbox text-xl"></i>
                            </div>
                            <p class="text-gray-500">Aucune inscription récente</p>
                            <p class="text-sm text-gray-400 mt-1">Les nouvelles inscriptions apparaîtront ici</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Actions rapides -->
        <div class="bg-white rounded-lg">
            <div class="p-6 border-b">
                <h2 class="text-lg font-medium text-gray-800">Actions rapides</h2>
            </div>
            
            <div class="divide-y divide-gray-100">
                <!-- Ajouter une formation -->
                <a href="{{ route('admin.formations.create') }}" class="block p-6 hover:bg-gray-50">
                    <div class="flex items-center">
                        <div class="mr-4 text-gray-500">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Ajouter une formation</p>
                            <p class="text-xs text-gray-500 mt-1">Créer une nouvelle offre de formation</p>
                        </div>
                    </div>
                </a>
                
                <!-- Gérer les catégories -->
                <a href="{{ route('admin.categories.index') }}" class="block p-6 hover:bg-gray-50">
                    <div class="flex items-center">
                        <div class="mr-4 text-gray-500">
                            <i class="fas fa-folder"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Gérer les catégories</p>
                            <p class="text-xs text-gray-500 mt-1">Organiser les formations par thème</p>
                        </div>
                    </div>
                </a>
                
                <!-- Voir les statistiques -->
                <a href="{{ route('admin.statistiques') }}" class="block p-6 hover:bg-gray-50">
                    <div class="flex items-center">
                        <div class="mr-4 text-gray-500">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Voir les statistiques</p>
                            <p class="text-xs text-gray-500 mt-1">Analyser les tendances d'inscription</p>
                        </div>
                    </div>
                </a>
                
                <!-- Visiter le site -->
                <a href="{{ route('home') }}" class="block p-6 hover:bg-gray-50">
                    <div class="flex items-center">
                        <div class="mr-4 text-gray-500">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">Visiter le site public</p>
                            <p class="text-xs text-gray-500 mt-1">Voir le site comme un visiteur</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 