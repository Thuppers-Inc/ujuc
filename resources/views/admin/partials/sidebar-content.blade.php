<!-- Navigation principale -->
<nav class="space-y-6">
    <!-- Dashboard -->
    <div>
        <a href="{{ route('admin.dashboard') }}" 
           class="sidebar-menu-item py-2 px-4 flex items-center text-sm font-medium text-white {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt w-6 text-center"></i>
            <span class="ml-3">Tableau de bord</span>
        </a>
    </div>

    <!-- Gestion -->
    <div>
        <p class="sidebar-heading px-4 mb-2">Gestion</p>
        
        <a href="{{ route('admin.categories.index') }}" 
           class="sidebar-menu-item py-2 px-4 flex items-center text-sm font-medium text-white {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
            <i class="fas fa-folder w-6 text-center"></i>
            <span class="ml-3">Catégories</span>
        </a>
        
        <a href="{{ route('admin.formations.index') }}" 
           class="sidebar-menu-item py-2 px-4 flex items-center text-sm font-medium text-white {{ request()->routeIs('admin.formations.*') ? 'active' : '' }}">
            <i class="fas fa-graduation-cap w-6 text-center"></i>
            <span class="ml-3">Formations</span>
        </a>
        
        <a href="{{ route('admin.inscriptions.index') }}" 
           class="sidebar-menu-item py-2 px-4 flex items-center text-sm font-medium text-white {{ request()->routeIs('admin.inscriptions.*') ? 'active' : '' }}">
            <i class="fas fa-users w-6 text-center"></i>
            <span class="ml-3">Inscriptions</span>
            @if($nbInscriptionsEnAttente = \App\Models\Inscription::where('statut', 'en_attente')->count())
                <span class="ml-auto bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                    {{ $nbInscriptionsEnAttente }}
                </span>
            @endif
        </a>
    </div>

    <!-- Analyse -->
    <div>
        <p class="sidebar-heading px-4 mb-2">Analyse</p>
        
        <a href="{{ route('admin.statistiques') }}" 
           class="sidebar-menu-item py-2 px-4 flex items-center text-sm font-medium text-white {{ request()->routeIs('admin.statistiques') ? 'active' : '' }}">
            <i class="fas fa-chart-bar w-6 text-center"></i>
            <span class="ml-3">Statistiques</span>
        </a>
    </div>

    <!-- Paramètres -->
    <div>
        <p class="sidebar-heading px-4 mb-2">Paramètres</p>
        
        <a href="{{ route('admin.profile.edit') }}" 
           class="sidebar-menu-item py-2 px-4 flex items-center text-sm font-medium text-white {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
            <i class="fas fa-user-cog w-6 text-center"></i>
            <span class="ml-3">Mon profil</span>
        </a>
    </div>
</nav>

<!-- Lien vers le site -->
<div class="mt-8 px-4">
    <a href="{{ route('home') }}" 
       class="py-2 px-4 bg-gray-700 hover:bg-gray-600 text-white rounded-lg flex items-center text-sm font-medium transition-colors duration-200">
        <i class="fas fa-globe w-6 text-center"></i>
        <span class="ml-3">Visiter le site</span>
    </a>
</div> 