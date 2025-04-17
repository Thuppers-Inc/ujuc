@extends('site.layouts.formations')

@section('title', 'Formations - ' . $categorie->nom)

@section('hero')
    <x-site.formations-hero 
        :title="$categorie->nom" 
        :description="$categorie->description ?? 'Découvrez nos formations dans la catégorie ' . $categorie->nom . '.'" 
    />
@endsection

@section('sidebar')
    <x-site.categories-sidebar :categories="$categories" :currentCategory="$categorie" />
@endsection

@section('formations-content')
    @if($formations->isEmpty())
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-8">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-exclamation-circle text-yellow-400"></i>
                </div>
                <div class="ml-3">
                    <p class="text-yellow-700">
                        Aucune formation n'est disponible dans cette catégorie pour le moment.
                    </p>
                </div>
            </div>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($formations as $formation)
                <x-site.formation-card :formation="$formation" />
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="mt-8">
            {{ $formations->links() }}
        </div>
    @endif
@endsection

@section('cta')
    <x-site.formations-cta 
        title="Prêt à vous lancer ?" 
        text="Inscrivez-vous dès maintenant à l'une de nos formations de {{ $categorie->nom }} et développez les compétences qui vous permettront de réussir."
    >
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('formations.index') }}" class="bg-white text-orange-500 hover:bg-gray-100 border-2 border-orange-500 py-2 px-6 rounded-lg font-semibold transition-all">
                Voir toutes les formations
            </a>
            <a href="{{ route('contact') }}" class="bg-orange-500 hover:bg-orange-600 text-white py-2 px-6 rounded-lg font-semibold transition-colors duration-200">
                Contactez-nous
            </a>
        </div>
    </x-site.formations-cta>
@endsection 