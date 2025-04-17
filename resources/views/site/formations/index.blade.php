@extends('site.layouts.formations')

@section('title', 'Nos Formations')

@section('hero')
    <x-site.formations-hero title="Nos Formations" description="Découvrez toutes nos formations disponibles et trouvez celle qui vous permettra de développer les compétences recherchées sur le marché du travail.">
        <a href="#formations-list" class="bg-white text-orange-500 hover:bg-gray-100 transition-all duration-300 font-medium py-2 px-6 rounded-md shadow-md inline-flex items-center">
            <i class="fas fa-search mr-2"></i>Explorer nos formations
        </a>
    </x-site.formations-hero>
@endsection

@section('sidebar')
    <x-site.categories-sidebar :categories="$categories" />
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
                        Aucune formation disponible pour le moment.
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
    <x-site.formations-cta />
@endsection 