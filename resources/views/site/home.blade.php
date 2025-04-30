@extends('site.layouts.app')

@section('title', 'Accueil')

@push('styles')
<style>
    :root {
        --primary: #F27438;
        --secondary: #26474E;
        --dark: #18534F;
        --light: #f8f9fa;
        --accent: #ffd166;
    }
    
    .btn-custom-primary {
        background-color: var(--primary);
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-block;
        text-align: center;
        border: 2px solid var(--primary);
    }
    
    .btn-custom-primary:hover {
        background-color: #e05f21;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(242, 116, 56, 0.25);
    }
    
    .btn-custom-secondary {
        background-color: transparent;
        color: var(--light);
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-block;
        text-align: center;
        border: 2px solid var(--light);
    }
    
    .btn-custom-secondary:hover {
        background-color: rgba(255, 255, 255, 0.1);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 255, 255, 0.2);
    }

    .bg-custom-primary {
        background-color: var(--primary);
    }
    
    .bg-custom-secondary {
        background-color: var(--secondary);
    }
    
    .bg-custom-dark {
        background-color: var(--dark);
    }
    
    .text-custom-primary {
        color: var(--primary);
    }
    
    .text-custom-secondary {
        color: var(--secondary);
    }
    
    .text-custom-dark {
        color: var(--dark);
    }
    
    .custom-card {
        transition: all 0.3s ease;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }
    
    .custom-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
    }
    
    .feature-icon {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin-bottom: 1.5rem;
        background-color: rgba(242, 116, 56, 0.1);
        color: var(--primary);
        font-size: 1.5rem;
        transition: all 0.3s ease;
    }
    
    .feature-card:hover .feature-icon {
        background-color: var(--primary);
        color: white;
        transform: scale(1.1);
    }
    
    .hero-section {
        position: relative;
        background: linear-gradient(120deg, var(--secondary), var(--dark));
        padding: 6rem 0;
        overflow: hidden;
    }
    
    .hero-section::before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        width: 40%;
        height: 100%;
        background-color: var(--primary);
        opacity: 0.05;
        clip-path: polygon(25% 0%, 100% 0%, 100% 100%, 0% 100%);
    }
    
    .hero-section::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 30%;
        height: 70%;
        background-color: var(--primary);
        opacity: 0.05;
        clip-path: polygon(0% 30%, 100% 0%, 100% 100%, 0% 100%);
    }
    
    .hero-img {
        border-radius: 1.5rem;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        transition: all 0.5s ease;
        position: relative;
        z-index: 10;
    }
    
    .hero-img:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }
    
    .feature-section {
        position: relative;
        background-color: var(--light);
        z-index: 1;
        padding: 6rem 0;
    }
    
    .feature-section::before {
        content: "";
        position: absolute;
        top: -50px;
        left: 0;
        right: 0;
        height: 100px;
        background-color: var(--light);
        transform: skewY(-2deg);
        z-index: -1;
    }

    /* Custom styles for dots pattern */
    .pattern-dots {
        background-image: radial-gradient(currentColor 1px, transparent 1px);
        background-size: 20px 20px;
    }

    /* Styles pour les cartes partenaires */
    .partner-card {
        perspective: 1000px;
        transform-style: preserve-3d;
    }
    
    .partner-card .card-inner {
        transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
    }
    
    .partner-card:hover .card-inner {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }
    
    .partner-card .logo-container {
        transition: transform 0.5s cubic-bezier(0.23, 1, 0.32, 1);
    }
    
    .partner-card:hover .logo-container {
        transform: scale(1.05);
    }
    
    .partner-card .overlay {
        opacity: 0;
        background: linear-gradient(to top, rgba(38, 71, 78, 0.85), transparent 70%);
        transform: translateY(10px);
        transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
    }
    
    .partner-card:hover .overlay {
        opacity: 1;
        transform: translateY(0);
    }
    
    .partner-card .partner-title {
        position: relative;
        transition: all 0.3s ease;
    }
    
    .partner-card .partner-title:after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: -4px;
        left: 50%;
        background-color: var(--primary);
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }
    
    .partner-card:hover .partner-title {
        color: var(--primary);
    }
    
    .partner-card:hover .partner-title:after {
        width: 40px;
    }
    
    .partner-card .action-button {
        transform: translateY(20px);
        opacity: 0;
        transition: all 0.3s 0.1s ease;
    }
    
    .partner-card:hover .action-button {
        transform: translateY(0);
        opacity: 1;
    }
</style>
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="hero-section text-white">
        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h5 class="text-custom-primary font-semibold mb-2 bg-white bg-opacity-10 inline-block px-3 py-1 rounded-full">Transformez votre avenir</h5>
                    <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight">Propulsez votre <span class="text-custom-primary">carrière</span> avec nos formations</h1>
                    <p class="text-xl mb-8 text-gray-100 leading-relaxed">
                        Acquérez des compétences recherchées sur le marché du travail et boostez votre employabilité. Nos formations sont conçues pour faciliter votre insertion professionnelle.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('formations.index') }}" class="btn-custom-primary">
                            Je m'inscris
                        </a>
                        <a href="#categories" class="btn-custom-secondary">
                            En savoir plus
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 px-4">
                    <img src="{{ asset('img/hero-image-youngs-african.jpg') }}" alt="Formation professionnelle en Afrique" class="hero-img w-full object-cover h-auto">
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="feature-section">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h5 class="text-custom-primary font-semibold mb-2">Votre réussite, notre priorité</h5>
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-custom-secondary">Pourquoi choisir notre programme ?</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Notre approche unique combine expertise, pratique et accompagnement personnalisé pour garantir votre réussite professionnelle.
                </p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="custom-card bg-white p-8 feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-custom-secondary">Formations pratiques</h3>
                    <p class="text-gray-600">Nos programmes sont axés sur l'application concrète des compétences avec des projets réels et des mises en situation professionnelles.</p>
                </div>
                
                <div class="custom-card bg-white p-8 feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-custom-secondary">Experts du domaine</h3>
                    <p class="text-gray-600">Apprenez avec des formateurs professionnels actifs dans leur domaine qui partagent leur expérience et leurs conseils pratiques.</p>
                </div>
                
                <div class="custom-card bg-white p-8 feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-custom-secondary">Opportunités d'emploi</h3>
                    <p class="text-gray-600">Nos formations sont conçues en collaboration avec des employeurs pour répondre directement aux besoins du marché du travail.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section id="categories" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h5 class="text-custom-primary font-semibold mb-2">Explorez nos domaines d'expertise</h5>
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-custom-secondary">Nos catégories de formations</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Découvrez une variété de formations adaptées à vos besoins professionnels spécifiques et à vos objectifs de carrière.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($categories as $categorie)
                <a href="{{ route('formations.categorie', $categorie->slug) }}" class="block group">
                    <div class="custom-card bg-white border border-gray-200 h-full flex flex-col">
                        <div class="h-48 overflow-hidden bg-gray-100">
                            @if($categorie->image)
                                <img src="{{ asset('storage/' . $categorie->image) }}" 
                                     alt="{{ $categorie->nom }}" 
                                     class="w-full h-full object-cover group-hover:scale-105 transition-all duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-custom-secondary bg-opacity-10">
                                    <i class="fas {{ $categorie->getIconClass() }} text-4xl text-custom-primary"></i>
                                </div>
                            @endif
                        </div>
                        <div class="p-6 flex flex-col flex-grow bg-gradient-to-br from-gray-50 to-white">
                            <h3 class="text-xl font-semibold mb-2 text-custom-secondary group-hover:text-custom-primary transition-colors">
                                {{ $categorie->nom }}
                            </h3>
                            <p class="text-gray-600 mb-4 flex-grow">
                                {{ Str::limit($categorie->description, 100) }}
                            </p>
                            <div class="flex items-center justify-between mt-auto">
                                <span class="text-sm text-custom-primary font-medium">
                                    {{ $categorie->formations_count ?? 0 }} formation(s)
                                </span>
                                <span class="text-custom-primary group-hover:translate-x-2 transition-transform">
                                    <i class="fas fa-arrow-right"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
                @empty
                <div class="col-span-full text-center py-8">
                    <div class="bg-gray-100 rounded-lg p-8 inline-block">
                        <i class="fas fa-folder-open text-4xl text-gray-400 mb-4"></i>
                        <p class="text-lg text-gray-500">Aucune catégorie disponible pour le moment.</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Featured Formations Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h5 class="text-custom-primary font-semibold mb-2">Nos meilleures offres</h5>
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-custom-secondary">Formations en vedette</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Ces formations à succès ont aidé de nombreux professionnels à atteindre leurs objectifs de carrière.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($formationsEnVedette as $formation)
                <div class="custom-card bg-white h-full flex flex-col overflow-hidden">
                    <div class="relative h-56 overflow-hidden">
                        @if($formation->image)
                            <img src="{{ asset('storage/' . $formation->image) }}" 
                                 alt="{{ $formation->titre }}" 
                                 class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-custom-secondary bg-opacity-10">
                                <i class="fas fa-chalkboard-teacher text-4xl text-custom-primary"></i>
                            </div>
                        @endif
                        
                        @if($formation->categorie)
                            <span class="absolute top-4 left-4 bg-custom-primary text-white text-sm font-medium py-1 px-3 rounded-full">
                                {{ $formation->categorie->nom }}
                            </span>
                        @endif
                    </div>
                    
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex justify-between items-center mb-3">
                            <div class="flex items-center text-sm">
                                @if($formation->isComplet())
                                    <span class="bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                                        Complet
                                    </span>
                                @elseif($formation->isPresqueComplet())
                                    <span class="bg-amber-100 text-amber-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                                        Presque complet
                                    </span>
                                @endif
                            </div>
                            <div class="flex items-center text-sm">
                                <i class="fas fa-users text-custom-primary mr-2"></i>
                                <span class="text-gray-600">{{ $formation->getPlacesDisponibles() - $formation->getInscriptionsConfirmees() }} places restantes</span>
                            </div>
                        </div>
                        
                        <!-- Indicateur de complétude -->
                        <div class="w-full bg-gray-200 rounded-full h-1.5 mb-3">
                            <div class="bg-custom-primary h-1.5 rounded-full" style="width: {{ $formation->getTauxOccupation() }}%"></div>
                        </div>
                        
                        <!-- Badges format et niveau -->
                        <div class="flex flex-wrap gap-2 mb-3">
                            <span class="{{ $formation->getFormatBgColor() }} text-xs font-medium px-2.5 py-0.5 rounded flex items-center gap-1">
                                <i class="fas {{ $formation->getFormatIcon() }}"></i>
                                {{ ucfirst($formation->format) }}
                            </span>
                            
                            <span class="{{ $formation->getNiveauBgColor() }} text-xs font-medium px-2.5 py-0.5 rounded flex items-center gap-1">
                                <i class="fas {{ $formation->getNiveauIcon() }}"></i>
                                Niveau {{ ucfirst($formation->niveau_requis) }}
                            </span>
                        </div>
                        
                        <h3 class="text-xl font-semibold mb-2 text-custom-secondary hover:text-custom-primary transition-colors">
                            <a href="{{ route('formations.show', $formation->slug) }}">
                                {{ $formation->titre }}
                            </a>
                        </h3>
                        
                        <p class="text-gray-600 mb-6 flex-grow">
                            {{ Str::limit($formation->description, 120) }}
                        </p>
                        
                        <div class="mt-auto flex justify-between items-center">
                            <span class="font-bold text-custom-dark text-lg">
                                @if($formation->prix == 0)
                                    Gratuit
                                @else
                                    {{ number_format($formation->prix, 0, ',', ' ') }} FCFA
                                @endif
                            </span>
                            <a href="{{ route('formations.show', $formation->slug) }}" 
                               class="bg-custom-primary text-white py-2 px-4 rounded-md hover:bg-custom-dark transition-colors">
                                Détails
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-8">
                    <div class="bg-gray-100 rounded-lg p-8 inline-block">
                        <i class="fas fa-book text-4xl text-gray-400 mb-4"></i>
                        <p class="text-lg text-gray-500">Aucune formation disponible pour le moment.</p>
                    </div>
                </div>
                @endforelse
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('formations.index') }}" class="btn-custom-primary">
                    Voir toutes nos formations
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h5 class="text-custom-primary font-semibold mb-2">Ce que disent nos apprenants</h5>
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-custom-secondary">Témoignages</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Découvrez comment nos formations ont transformé la carrière de nos apprenants.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="custom-card bg-white p-8 relative">
                    <div class="absolute -top-4 left-8 text-5xl text-custom-primary opacity-20">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <div class="relative z-10">
                        <p class="italic text-gray-600 mb-6">
                            "La formation en développement web m'a permis d'acquérir des compétences pratiques que j'ai pu immédiatement appliquer dans mon travail. Les formateurs sont excellents et le contenu est très pertinent."
                        </p>
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-custom-secondary mr-4 overflow-hidden">
                                <img src="https://randomuser.me/api/portraits/women/12.jpg" alt="Portrait" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-bold text-custom-secondary">Aminata Diallo</h4>
                                <p class="text-sm text-gray-500">Développeuse Front-end</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="custom-card bg-white p-8 relative">
                    <div class="absolute -top-4 left-8 text-5xl text-custom-primary opacity-20">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <div class="relative z-10">
                        <p class="italic text-gray-600 mb-6">
                            "J'ai suivi la formation en marketing digital et j'ai pu décrocher un poste dans une agence juste un mois après. Le programme est complet et les études de cas très pertinentes."
                        </p>
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-custom-secondary mr-4 overflow-hidden">
                                <img src="https://randomuser.me/api/portraits/men/50.jpg" alt="Portrait" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-bold text-custom-secondary">Moussa Konaté</h4>
                                <p class="text-sm text-gray-500">Spécialiste Marketing Digital</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="custom-card bg-white p-8 relative">
                    <div class="absolute -top-4 left-8 text-5xl text-custom-primary opacity-20">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <div class="relative z-10">
                        <p class="italic text-gray-600 mb-6">
                            "La certification en gestion de projet m'a ouvert de nombreuses portes. Les méthodes enseignées sont modernes et le support des formateurs même après la formation est inestimable."
                        </p>
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-custom-secondary mr-4 overflow-hidden">
                                <img src="https://randomuser.me/api/portraits/women/89.jpg" alt="Portrait" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h4 class="font-bold text-custom-secondary">Fatou Camara</h4>
                                <p class="text-sm text-gray-500">Chef de Projet IT</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Partenaires Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h5 class="text-custom-primary font-semibold mb-2">Ils nous font confiance</h5>
                <h2 class="text-3xl md:text-4xl font-bold mb-4 text-custom-secondary">Nos partenaires</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Nous collaborons avec des entreprises et des organisations de premier plan pour offrir des formations pertinentes et de qualité.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                <!-- Partner 1 -->
                <a href="https://thuppers.com" target="_blank" class="custom-card bg-white p-6 flex items-center justify-center h-32">
                    <div class="w-full h-full flex items-center justify-center">
                        <img src="{{ asset('img/partners/thuppers-inc.png') }}" alt="Thuppers Inc" class="h-32">
                        {{-- <span class="text-xl font-bold text-custom-secondary">Thuppers Inc</span> --}}
                    </div>
                </a>
                
                <!-- Partner 2 -->
                <a href="https://agenceemploijeunes.ci/site/" target="_blank" class="custom-card bg-white p-6 flex items-center justify-center h-32">
                    <div class="w-full h-full flex items-center justify-center">
                        <img src="{{ asset('img/partners/aej.png') }}" alt="Agence Emploi Jeune" class="h-32">
                    </div>
                </a>
                
                <!-- Partner 3 -->
                <a href="#https://inayagroup.com" target="_blank" class="custom-card bg-white p-6 flex items-center justify-center h-32">
                    <div class="w-full h-full flex items-center justify-center">
                        <img src="{{ asset('img/partners/inaya-group.png') }}" alt="INAYA GROUP" class="h-32">
                    </div>
                </a>
                
                
            </div>
            
        </div>
        <div class="text-center mt-12">
            <a href="{{ route('contact') }}" class="text-custom-primary hover:text-custom-secondary transition-colors font-medium">
                Devenir partenaire <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </section>

    <!-- CTA Section -->
    {{-- <section class="py-20 relative bg-custom-secondary">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0 bg-custom-primary opacity-20 pattern-dots"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6 text-white">
                    Prêt à développer vos compétences professionnelles ?
                </h2>
                <p class="text-xl text-white opacity-90 mb-8">
                    Rejoignez-nous dès aujourd'hui et transformez votre carrière avec nos formations de qualité.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('formations.index') }}" class="btn-custom-primary bg-white text-custom-secondary hover:bg-gray-100">
                        Découvrir nos formations
                    </a>
                    <a href="{{ route('contact') }}" class="btn-custom-outline border-white text-white hover:bg-white hover:text-custom-secondary">
                        Nous contacter
                    </a>
                </div>
            </div>
        </div>
    </section> --}}
@endsection 