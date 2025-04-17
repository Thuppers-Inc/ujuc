@extends('admin.layouts.app')

@section('title', 'Gestion des inscriptions')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- En-tête avec titre et boutons d'action -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            Gestion des inscriptions
        </h1>
        
        <!-- Boutons d'actions et filtres -->
        <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
            <select id="status-filter" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm">
                <option value="all">Tous les statuts</option>
                <option value="en_attente">En attente</option>
                <option value="confirmé">Confirmés</option>
                <option value="annulé">Annulés</option>
            </select>
            
            <div class="relative">
                <input type="text" id="search-inscriptions" placeholder="Rechercher..." class="pl-10 w-full sm:w-64 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Messages d'alerte -->
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

    <!-- Dashboard Stats en haut -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 transition-all duration-300 hover:shadow-md">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-indigo-100 rounded-full p-3">
                    <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Total inscriptions</p>
                    <div class="flex items-baseline">
                        <p class="text-2xl font-bold text-gray-900">{{ $inscriptions->total() }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 transition-all duration-300 hover:shadow-md">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-yellow-100 rounded-full p-3">
                    <svg class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">En attente</p>
                    <div class="flex items-baseline">
                        <p class="text-2xl font-bold text-gray-900" id="pending-count">
                            {{ $inscriptions->where('statut', 'en_attente')->count() }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 transition-all duration-300 hover:shadow-md">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-green-100 rounded-full p-3">
                    <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Confirmées</p>
                    <div class="flex items-baseline">
                        <p class="text-2xl font-bold text-gray-900" id="confirmed-count">
                            {{ $inscriptions->where('statut', 'confirmé')->count() }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-200 transition-all duration-300 hover:shadow-md">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-red-100 rounded-full p-3">
                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Annulées</p>
                    <div class="flex items-baseline">
                        <p class="text-2xl font-bold text-gray-900" id="canceled-count">
                            {{ $inscriptions->where('statut', 'annulé')->count() }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tableau des inscriptions -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6 border border-gray-200">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom complet</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Formation</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="inscriptions-table-body">
                    @forelse ($inscriptions as $inscription)
                    <tr class="hover:bg-gray-50 inscription-row transition-colors duration-150" data-status="{{ $inscription->statut }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#{{ $inscription->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $inscription->getNomComplet() }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex flex-col">
                                <span class="font-medium text-gray-900">{{ $inscription->formation->titre }}</span>
                                <span class="text-xs text-gray-500">{{ $inscription->formation->categorie->nom }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex flex-col">
                                <span>{{ $inscription->contact }}</span>
                                <a href="mailto:{{ $inscription->email }}" class="text-indigo-600 hover:text-indigo-800 text-xs hover:underline transition-colors">
                                    {{ $inscription->email }}
                                </a>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($inscription->estEnAttente())
                                <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    <svg class="h-3.5 w-3.5 mr-1 text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    En attente
                                </span>
                            @elseif($inscription->estConfirmee())
                                <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    <svg class="h-3.5 w-3.5 mr-1 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    Confirmé
                                </span>
                            @elseif($inscription->estAnnulee())
                                <span class="px-2.5 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    <svg class="h-3.5 w-3.5 mr-1 text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Annulé
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $inscription->created_at->format('d/m/Y') }}
                            <span class="text-xs text-gray-400">{{ $inscription->created_at->format('H:i') }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-1">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.inscriptions.show', $inscription) }}" class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 p-1.5 rounded-full hover:bg-indigo-100 transition-colors" title="Voir détails">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <a href="{{ route('admin.inscriptions.edit', $inscription) }}" class="text-yellow-600 hover:text-yellow-900 bg-yellow-50 p-1.5 rounded-full hover:bg-yellow-100 transition-colors" title="Modifier">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                                <form action="{{ route('admin.inscriptions.destroy', $inscription) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette inscription ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 p-1.5 rounded-full hover:bg-red-100 transition-colors" title="Supprimer">
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-10 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="h-12 w-12 text-gray-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                </svg>
                                <p class="text-lg font-medium mb-1">Aucune inscription trouvée</p>
                                <p class="text-sm text-gray-400">Les inscriptions s'afficheront ici une fois que des utilisateurs s'inscriront</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $inscriptions->links() }}
    </div>

    <!-- Graphique et statistiques -->
    <div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Tendances des inscriptions</h2>
            <div class="h-64 flex items-center justify-center" id="chart-container">
                <canvas id="inscriptions-chart"></canvas>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200 p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Taux de conversion</h2>
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm font-medium text-gray-600">Global</span>
                        <span class="text-sm font-medium text-gray-900" id="global-rate">
                            @php
                                $total = $inscriptions->total();
                                $confirmed = $inscriptions->where('statut', 'confirmé')->count();
                                $rate = $total > 0 ? round(($confirmed / $total) * 100) : 0;
                            @endphp
                            {{ $rate }}%
                        </span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-indigo-600 h-2 rounded-full" style="width: {{ $rate }}%"></div>
                    </div>
                </div>
                
                <div class="pt-3 border-t border-gray-100">
                    <h3 class="text-sm font-medium text-gray-800 mb-3">Par catégorie</h3>
                    <div class="space-y-3" id="category-rates">
                        <div class="text-center text-sm text-gray-500">
                            <svg class="inline-block w-5 h-5 text-gray-400 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Chargement...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Filtrage par statut
        const statusFilter = document.getElementById('status-filter');
        const rows = document.querySelectorAll('.inscription-row');
        const searchInput = document.getElementById('search-inscriptions');
        
        function filterTable() {
            const selectedStatus = statusFilter.value;
            const searchTerm = searchInput.value.toLowerCase();
            
            let pending = 0;
            let confirmed = 0;
            let canceled = 0;
            let visible = 0;
            
            rows.forEach(row => {
                const status = row.dataset.status;
                const rowText = row.textContent.toLowerCase();
                const statusMatch = selectedStatus === 'all' || status === selectedStatus;
                const searchMatch = rowText.includes(searchTerm);
                
                if (statusMatch && searchMatch) {
                    row.classList.remove('hidden');
                    visible++;
                    
                    if (status === 'en_attente') pending++;
                    if (status === 'confirmé') confirmed++;
                    if (status === 'annulé') canceled++;
                } else {
                    row.classList.add('hidden');
                }
            });
            
            // Mettre à jour les compteurs
            document.getElementById('pending-count').textContent = pending;
            document.getElementById('confirmed-count').textContent = confirmed;
            document.getElementById('canceled-count').textContent = canceled;
        }
        
        statusFilter.addEventListener('change', filterTable);
        searchInput.addEventListener('keyup', filterTable);
        
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
        
        // Graphique des inscriptions sur les 6 derniers mois
        const ctx = document.getElementById('inscriptions-chart').getContext('2d');
        
        // Exemple de données - à remplacer par des données réelles
        const months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin'];
        const pendingData = [5, 8, 12, 7, 10, 15];
        const confirmedData = [3, 5, 8, 4, 6, 10];
        
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: months,
                datasets: [
                    {
                        label: 'En attente',
                        data: pendingData,
                        borderColor: '#fbbf24',
                        backgroundColor: 'rgba(251, 191, 36, 0.1)',
                        tension: 0.3,
                        fill: true
                    },
                    {
                        label: 'Confirmées',
                        data: confirmedData,
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        tension: 0.3,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
        
        // Simuler le chargement des taux par catégorie
        setTimeout(() => {
            const categoryRatesContainer = document.getElementById('category-rates');
            categoryRatesContainer.innerHTML = `
                <div>
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm text-gray-600">Informatique</span>
                        <span class="text-sm font-medium text-gray-900">78%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: 78%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm text-gray-600">Marketing</span>
                        <span class="text-sm font-medium text-gray-900">65%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-purple-500 h-2 rounded-full" style="width: 65%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-sm text-gray-600">Design</span>
                        <span class="text-sm font-medium text-gray-900">82%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-pink-500 h-2 rounded-full" style="width: 82%"></div>
                    </div>
                </div>
            `;
        }, 1000);
    });
</script>
@endpush
@endsection 