@extends('site.layouts.app')

@section('title', 'Inscription confirmée')

@section('content')
    <!-- Confirmation Section -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-8">
                <div class="text-center mb-6">
                    <div class="inline-block p-4 bg-green-100 text-green-500 rounded-full mb-4">
                        <i class="fas fa-check-circle text-4xl"></i>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">Merci pour votre inscription !</h1>
                    <p class="text-lg text-gray-600">Votre demande d'inscription a été enregistrée avec succès.</p>
                    <p class="text-xl font-semibold text-primary-600 mt-2">№ {{ $inscription->getNumeroInscription() }}</p>
                </div>
                
                <div class="border-t border-b border-gray-200 py-6 my-6">
                    <h2 class="text-xl font-semibold mb-4">Détails de votre inscription</h2>
                    
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500">Nom et prénoms</p>
                                <p class="font-medium">{{ $inscription->getNomComplet() }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Formation</p>
                                <p class="font-medium">{{ $inscription->formation->titre }}</p>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500">Contact</p>
                                <p class="font-medium">{{ $inscription->contact }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Ville/Commune</p>
                                <p class="font-medium">{{ $inscription->ville->nom }}</p>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @if($inscription->email)
                                <div>
                                    <p class="text-sm text-gray-500">Email</p>
                                    <p class="font-medium">{{ $inscription->email }}</p>
                                </div>
                            @endif
                            @if($inscription->niveau_etude)
                                <div>
                                    <p class="text-sm text-gray-500">Niveau d'étude</p>
                                    <p class="font-medium">{{ $inscription->niveau_etude }}</p>
                                </div>
                            @endif
                        </div>
                        
                        <div>
                            <p class="text-sm text-gray-500">Statut</p>
                            <p class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                En attente de confirmation
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-lg mb-6">
                    <h3 class="font-semibold text-lg mb-2">Prochaines étapes</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-start">
                            <i class="fas fa-arrow-right text-primary-500 mt-1 mr-2"></i>
                            <span>Nous allons traiter votre demande d'inscription dans les plus brefs délais.</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-arrow-right text-primary-500 mt-1 mr-2"></i>
                            <span>Un membre de notre équipe vous contactera par téléphone pour confirmer votre inscription et vous fournir les détails pratiques (date de début, horaires, etc.).</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-arrow-right text-primary-500 mt-1 mr-2"></i>
                            <span>Pour toute question, n'hésitez pas à nous contacter au +225 07 12 34 56 78.</span>
                        </li>
                    </ul>
                </div>
                
                <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4 justify-center">
                    <a href="{{ route('home') }}" class="btn btn-outline">
                        Retour à l'accueil
                    </a>
                    <a href="{{ route('formations.index') }}" class="btn btn-primary">
                        Découvrir d'autres formations
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection 