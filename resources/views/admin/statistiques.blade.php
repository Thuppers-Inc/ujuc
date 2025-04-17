@extends('admin.layouts.app')

@section('title', 'Statistiques')
@section('header', 'Statistiques')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Aperçu global - Nouvelle section -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-gray-500 text-sm font-medium">Total inscriptions</h3>
                        <p class="text-2xl font-bold text-gray-800">{{ $statsGlobales['total_inscriptions'] }}</p>
                    </div>
                </div>
                <div class="mt-2 text-xs text-gray-500">Toutes les inscriptions dans le système</div>
            </div>
            <div class="bg-blue-500 h-1"></div>
        </div>
        
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                        <i class="fas fa-clock text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-gray-500 text-sm font-medium">En attente</h3>
                        <p class="text-2xl font-bold text-gray-800">{{ $statsGlobales['inscriptions_en_attente'] }}</p>
                    </div>
                </div>
                <div class="mt-2 text-xs text-gray-500">Inscriptions nécessitant validation</div>
            </div>
            <div class="bg-yellow-500 h-1"></div>
        </div>
        
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <i class="fas fa-check-circle text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-gray-500 text-sm font-medium">Confirmées</h3>
                        <p class="text-2xl font-bold text-gray-800">{{ $statsGlobales['inscriptions_confirmees'] }}</p>
                    </div>
                </div>
                <div class="mt-2 text-xs text-gray-500">Inscriptions validées avec succès</div>
            </div>
            <div class="bg-green-500 h-1"></div>
        </div>
        
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                        <i class="fas fa-chart-pie text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-gray-500 text-sm font-medium">Taux de conversion</h3>
                        <p class="text-2xl font-bold text-gray-800">{{ $statsGlobales['taux_conversion_global'] }}%</p>
                    </div>
                </div>
                <div class="mt-2 text-xs text-gray-500">Ratio inscriptions confirmées / total</div>
            </div>
            <div class="bg-indigo-500 h-1"></div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
        <!-- Statistiques par catégorie -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-800">Inscriptions par catégorie</h2>
            </div>
            <div class="p-6">
                @if(count($inscriptionsParCategorie) > 0)
                    <div class="h-80">
                        <canvas id="categoriesChart"></canvas>
                    </div>
                    <div class="mt-4 space-y-3">
                        @php
                            $colors = [
                                'rgba(54, 162, 235, 0.7)',
                                'rgba(255, 99, 132, 0.7)',
                                'rgba(255, 206, 86, 0.7)',
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(153, 102, 255, 0.7)',
                                'rgba(255, 159, 64, 0.7)',
                                'rgba(199, 199, 199, 0.7)',
                                'rgba(83, 102, 255, 0.7)',
                                'rgba(40, 159, 64, 0.7)',
                                'rgba(210, 199, 199, 0.7)',
                            ];
                        @endphp
                        
                        @php $colorIndex = 0; @endphp
                        @foreach($inscriptionsParCategorie as $categorie => $count)
                            <div class="flex items-center">
                                <div class="w-3 h-3 rounded-full" style="background-color: {{ $colors[$colorIndex % count($colors)] }}"></div>
                                <span class="ml-2 text-sm text-gray-700">{{ $categorie }}</span>
                                <span class="ml-auto text-sm font-medium">{{ $count }} inscriptions</span>
                            </div>
                            @php $colorIndex++; @endphp
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-16">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 text-gray-400 mb-4">
                            <i class="fas fa-chart-pie text-2xl"></i>
                        </div>
                        <p class="text-gray-500">Aucune donnée disponible</p>
                        <p class="text-sm text-gray-400 mt-1">Les inscriptions seront visualisées ici</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Statistiques par mois -->
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-100">
                <h2 class="text-lg font-semibold text-gray-800">Inscriptions par mois ({{ date('Y') }})</h2>
            </div>
            <div class="p-6">
                @if(array_sum($inscriptionsParMoisFormate) > 0)
                    <div class="h-80">
                        <canvas id="monthlyChart"></canvas>
                    </div>
                    <div class="mt-4">
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                            @php
                                $total = array_sum($inscriptionsParMoisFormate);
                                $max = max($inscriptionsParMoisFormate);
                                $maxMonth = array_search($max, $inscriptionsParMoisFormate);
                            @endphp
                            
                            <div class="bg-blue-50 rounded-lg p-4">
                                <p class="text-sm text-blue-600 font-medium">Total</p>
                                <p class="text-2xl font-bold text-gray-800">{{ $total }}</p>
                                <p class="text-xs text-gray-500 mt-1">inscriptions</p>
                            </div>
                            
                            <div class="bg-green-50 rounded-lg p-4">
                                <p class="text-sm text-green-600 font-medium">Mois record</p>
                                <p class="text-2xl font-bold text-gray-800">{{ $max }}</p>
                                <p class="text-xs text-gray-500 mt-1">{{ $maxMonth }}</p>
                            </div>
                            
                            <div class="bg-purple-50 rounded-lg p-4">
                                <p class="text-sm text-purple-600 font-medium">Moyenne</p>
                                <p class="text-2xl font-bold text-gray-800">{{ round($total / count($inscriptionsParMoisFormate), 1) }}</p>
                                <p class="text-xs text-gray-500 mt-1">par mois</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="text-center py-16">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 text-gray-400 mb-4">
                            <i class="fas fa-chart-line text-2xl"></i>
                        </div>
                        <p class="text-gray-500">Aucune donnée disponible</p>
                        <p class="text-sm text-gray-400 mt-1">L'évolution des inscriptions sera affichée ici</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Formations les plus populaires - Nouvelle section -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
        <div class="px-6 py-5 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-gray-800">Top 5 des formations populaires</h2>
        </div>
        <div class="p-6">
            @if(count($formationsPopulaires) > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <th class="px-4 py-3">Formation</th>
                                <th class="px-4 py-3">Catégorie</th>
                                <th class="px-4 py-3 text-center">Inscriptions</th>
                                <th class="px-4 py-3 text-center">En attente</th>
                                <th class="px-4 py-3 text-center">Confirmées</th>
                                <th class="px-4 py-3 text-center">Taux de conversion</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($formationsPopulaires as $formation)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-3">
                                        <a href="{{ route('admin.formations.show', $formation['id']) }}" class="text-sm font-medium text-blue-600 hover:text-blue-800">
                                            {{ $formation['titre'] }}
                                        </a>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">
                                            {{ $formation['categorie'] }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <span class="text-sm font-medium">{{ $formation['total'] }}</span>
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <span class="text-sm text-yellow-600">{{ $formation['en_attente'] }}</span>
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <span class="text-sm text-green-600">{{ $formation['confirmees'] }}</span>
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <div class="flex items-center justify-center">
                                            <div class="w-16 bg-gray-200 rounded-full h-2 mr-2">
                                                <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $formation['taux_conversion'] }}%"></div>
                                            </div>
                                            <span class="text-xs font-medium">{{ $formation['taux_conversion'] }}%</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-8">
                    <p class="text-gray-500">Aucune donnée disponible pour les formations</p>
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Configuration des couleurs et styles pour les graphiques
        Chart.defaults.font.family = "'Inter', 'Helvetica', 'Arial', sans-serif";
        Chart.defaults.font.size = 12;
        Chart.defaults.color = '#64748b';
        
        // Couleurs pour les graphiques
        const colors = [
            'rgba(54, 162, 235, 0.7)',
            'rgba(255, 99, 132, 0.7)',
            'rgba(255, 206, 86, 0.7)',
            'rgba(75, 192, 192, 0.7)',
            'rgba(153, 102, 255, 0.7)',
            'rgba(255, 159, 64, 0.7)',
            'rgba(199, 199, 199, 0.7)',
            'rgba(83, 102, 255, 0.7)',
            'rgba(40, 159, 64, 0.7)',
            'rgba(210, 199, 199, 0.7)'
        ];
        
        // Graphique des catégories
        @if(count($inscriptionsParCategorie) > 0)
            const ctxCategories = document.getElementById('categoriesChart').getContext('2d');
            new Chart(ctxCategories, {
                type: 'doughnut',
                data: {
                    labels: {!! json_encode(array_keys($inscriptionsParCategorie->toArray())) !!},
                    datasets: [{
                        data: {!! json_encode(array_values($inscriptionsParCategorie->toArray())) !!},
                        backgroundColor: colors.slice(0, {{ count($inscriptionsParCategorie) }}),
                        borderWidth: 2,
                        borderColor: '#ffffff',
                        hoverOffset: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.formattedValue || '';
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = Math.round((context.raw / total) * 100);
                                    return `${label}: ${value} (${percentage}%)`;
                                }
                            }
                        }
                    },
                    cutout: '65%'
                }
            });
        @endif
        
        // Graphique des inscriptions mensuelles
        @if(array_sum($inscriptionsParMoisFormate) > 0)
            const ctxMonthly = document.getElementById('monthlyChart').getContext('2d');
            new Chart(ctxMonthly, {
                type: 'line',
                data: {
                    labels: {!! json_encode(array_keys($inscriptionsParMoisFormate)) !!},
                    datasets: [{
                        label: 'Inscriptions',
                        data: {!! json_encode(array_values($inscriptionsParMoisFormate)) !!},
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 2,
                        pointBackgroundColor: 'rgba(59, 130, 246, 1)',
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        fill: true,
                        tension: 0.2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(226, 232, 240, 0.6)'
                            },
                            ticks: {
                                precision: 0
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(255, 255, 255, 0.9)',
                            titleColor: '#1e293b',
                            bodyColor: '#334155',
                            borderColor: 'rgba(226, 232, 240, 1)',
                            borderWidth: 1,
                            padding: 12,
                            titleFont: {
                                weight: 'bold',
                                size: 14
                            },
                            bodyFont: {
                                size: 13
                            },
                            displayColors: false,
                            callbacks: {
                                label: function(context) {
                                    return `${context.parsed.y} inscriptions`;
                                }
                            }
                        }
                    }
                }
            });
        @endif
    });
</script>
@endpush
@endsection 