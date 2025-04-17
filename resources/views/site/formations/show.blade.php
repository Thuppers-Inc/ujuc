@extends('site.layouts.app')

@section('title', $formation->titre)

@section('content')
    <!-- Formation Details Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Formation Details -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <!-- Formation Image with fallback -->
                        <div class="relative w-full h-72">
                            <img src="{{ $formation->getImageUrl() }}" alt="{{ $formation->titre }}" class="w-full h-72 object-cover" 
                                 onerror="this.onerror=null; this.src='{{ asset('img/formation-default.jpg') }}'; this.alt='Image par défaut - {{ $formation->titre }}'">
                        </div>
                        
                        <!-- Formation Content -->
                        <div class="p-8">
                            <div class="flex items-center mb-4">
                                <a href="{{ route('formations.categorie', $formation->categorie->slug) }}" class="text-sm text-gray-500 hover:text-custom-primary">
                                    <i class="fas fa-folder-open mr-1"></i> {{ $formation->categorie->nom }}
                                </a>
                                @if($formation->duree_jours)
                                    <span class="mx-2 text-gray-300">|</span>
                                    <span class="text-sm text-gray-500">
                                        <i class="far fa-clock mr-1"></i> {{ $formation->duree_jours }} jours
                                    </span>
                                @endif
                            </div>
                            
                            <h1 class="text-3xl font-bold mb-4">{{ $formation->titre }}</h1>
                            
                            @if($formation->description)
                                <div class="prose prose-lg max-w-none mb-8">
                                    <p class="text-gray-700 text-lg">{{ $formation->description }}</p>
                                </div>
                            @endif
                            
                            <div class="border-t border-b border-gray-200 py-6 my-6">
                                <h2 class="text-2xl font-semibold mb-4">Contenu de la formation</h2>
                                @if($formation->contenu)
                                    <div class="prose prose-lg max-w-none">
                                        {!! nl2br(e($formation->contenu)) !!}
                                    </div>
                                @else
                                    <p class="text-gray-500 italic">Le contenu détaillé de cette formation sera bientôt disponible.</p>
                                @endif
                            </div>
                            
                            <div class="mt-8">
                                <h3 class="text-xl font-semibold mb-3">Pourquoi choisir cette formation ?</h3>
                                <ul class="space-y-2">
                                    <li class="flex items-start">
                                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                        <span>Formation adaptée aux besoins du marché</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                        <span>Formateurs experts et professionnels du domaine</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                        <span>Approche pratique orientée vers l'emploi</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                        <span>Accompagnement personnalisé</span>
                                    </li>
                                </ul>
                            </div>
                            
                            <!-- Call to Action for Mobile -->
                            <div class="mt-8 lg:hidden">
                                <a href="#inscription" class="btn-custom-primary block text-center">S'inscrire à cette formation</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Similar Formations -->
                    @if(count($formationsSimilaires) > 0)
                        <div class="mt-12">
                            <h2 class="text-2xl font-bold mb-6">Formations similaires</h2>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                @foreach($formationsSimilaires as $formationSimilaire)
                                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                        <a href="{{ route('formations.show', $formationSimilaire->slug) }}">
                                            <img src="{{ $formationSimilaire->getImageUrl() }}" alt="{{ $formationSimilaire->titre }}" class="w-full h-40 object-cover">
                                        </a>
                                        <div class="p-4">
                                            <a href="{{ route('formations.show', $formationSimilaire->slug) }}" class="block">
                                                <h3 class="font-semibold hover:text-custom-primary">{{ $formationSimilaire->titre }}</h3>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                
                <!-- Inscription Form -->
                <div class="lg:col-span-1" id="inscription">
                    <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                        <h2 class="text-2xl font-bold mb-6 text-center text-custom-secondary">S'inscrire à cette formation</h2>
                        
                        <form action="{{ route('inscription.store', $formation) }}" method="POST" class="space-y-4">
                            @csrf
                            
                            <div>
                                <label for="nom" class="form-label">Nom <span class="text-red-500">*</span></label>
                                <input type="text" id="nom" name="nom" value="{{ old('nom') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary" required>
                                @error('nom')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="prenoms" class="form-label">Prénoms <span class="text-red-500">*</span></label>
                                <input type="text" id="prenoms" name="prenoms" value="{{ old('prenoms') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary" required>
                                @error('prenoms')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="numero_cni" class="form-label">Numéro CNI</label>
                                <input type="text" id="numero_cni" name="numero_cni" value="{{ old('numero_cni') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary">
                                @error('numero_cni')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="ville_commune" class="form-label">Ville/Commune <span class="text-red-500">*</span></label>
                                <input type="text" id="ville_commune" name="ville_commune" value="{{ old('ville_commune') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary" required>
                                @error('ville_commune')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="contact" class="form-label">Contact (téléphone) <span class="text-red-500">*</span></label>
                                <input type="text" id="contact" name="contact" value="{{ old('contact') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary" required>
                                @error('contact')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary">
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="niveau_etude" class="form-label">Niveau d'étude</label>
                                <select id="niveau_etude" name="niveau_etude" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary">
                                    <option value="">-- Sélectionnez --</option>
                                    <option value="Primaire" {{ old('niveau_etude') == 'Primaire' ? 'selected' : '' }}>Primaire</option>
                                    <option value="Collège" {{ old('niveau_etude') == 'Collège' ? 'selected' : '' }}>Collège</option>
                                    <option value="Lycée" {{ old('niveau_etude') == 'Lycée' ? 'selected' : '' }}>Lycée</option>
                                    <option value="BAC" {{ old('niveau_etude') == 'BAC' ? 'selected' : '' }}>BAC</option>
                                    <option value="BAC+2" {{ old('niveau_etude') == 'BAC+2' ? 'selected' : '' }}>BAC+2</option>
                                    <option value="Licence" {{ old('niveau_etude') == 'Licence' ? 'selected' : '' }}>Licence</option>
                                    <option value="Master" {{ old('niveau_etude') == 'Master' ? 'selected' : '' }}>Master</option>
                                    <option value="Doctorat" {{ old('niveau_etude') == 'Doctorat' ? 'selected' : '' }}>Doctorat</option>
                                </select>
                                @error('niveau_etude')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="pt-2">
                                <button type="submit" class="btn-custom-primary w-full">S'inscrire maintenant</button>
                            </div>
                            
                            <p class="text-sm text-gray-500 mt-4">
                                <i class="fas fa-info-circle mr-1"></i> Les champs marqués d'un <span class="text-red-500">*</span> sont obligatoires.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="py-16 bg-custom-primary text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-6">Prêt à développer vos compétences ?</h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto">Découvrez nos autres formations et trouvez celle qui vous correspond le mieux.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('formations.index') }}" class="bg-white text-custom-primary hover:bg-gray-100 py-3 px-6 rounded-lg font-semibold transition-all">
                    Voir toutes les formations
                </a>
                <a href="{{ route('contact') }}" class="bg-transparent border-2 border-white text-white hover:bg-white hover:text-custom-primary py-3 px-6 rounded-lg font-semibold transition-all">
                    Nous contacter
                </a>
            </div>
        </div>
    </section>
@endsection 