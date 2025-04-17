<aside class="sidebar w-64 md:shadow transform -translate-x-full md:translate-x-0 transition-transform duration-150 ease-in bg-primary-800">
    <div class="sidebar-header flex items-center justify-center py-4">
        <div class="inline-flex">
            <a href="{{ route('admin.dashboard') }}" class="inline-flex flex-row items-center">
                <span class="leading-10 text-white text-2xl font-bold ml-1 uppercase">UJUC Admin</span>
            </a>
        </div>
    </div>
    <div class="sidebar-content px-4 py-6">
        <ul class="flex flex-col w-full">
            <li class="my-px">
                <a href="{{ route('admin.dashboard') }}" class="flex flex-row items-center h-10 px-3 rounded-lg text-white {{ request()->routeIs('admin.dashboard') ? 'bg-primary-700' : 'hover:bg-primary-700' }}">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            
            <li class="my-px">
                <span class="flex font-medium text-sm text-white px-4 my-4 uppercase">Gestion</span>
            </li>
            
            <li class="my-px">
                <a href="{{ route('admin.categories.index') }}" class="flex flex-row items-center h-10 px-3 rounded-lg text-white {{ request()->routeIs('admin.categories.*') ? 'bg-primary-700' : 'hover:bg-primary-700' }}">
                    <i class="fas fa-folder mr-3"></i>
                    <span class="ml-3">Catégories</span>
                </a>
            </li>
            
            <li class="my-px">
                <a href="{{ route('admin.formations.index') }}" class="flex flex-row items-center h-10 px-3 rounded-lg text-white {{ request()->routeIs('admin.formations.*') ? 'bg-primary-700' : 'hover:bg-primary-700' }}">
                    <i class="fas fa-graduation-cap mr-3"></i>
                    <span class="ml-3">Formations</span>
                </a>
            </li>
            
            <li class="my-px">
                <a href="{{ route('admin.inscriptions.index') }}" class="flex flex-row items-center h-10 px-3 rounded-lg text-white {{ request()->routeIs('admin.inscriptions.*') ? 'bg-primary-700' : 'hover:bg-primary-700' }}">
                    <i class="fas fa-users mr-3"></i>
                    <span class="ml-3">Inscriptions</span>
                </a>
            </li>
            
            <li class="my-px">
                <span class="flex font-medium text-sm text-white px-4 my-4 uppercase">Statistiques</span>
            </li>
            
            <li class="my-px">
                <a href="{{ route('admin.statistiques') }}" class="flex flex-row items-center h-10 px-3 rounded-lg text-white {{ request()->routeIs('admin.statistiques') ? 'bg-primary-700' : 'hover:bg-primary-700' }}">
                    <i class="fas fa-chart-bar mr-3"></i>
                    <span class="ml-3">Statistiques</span>
                </a>
            </li>
            
            <li class="my-px">
                <span class="flex font-medium text-sm text-white px-4 my-4 uppercase">Compte</span>
            </li>
            
            <li class="my-px">
                <a href="{{ route('admin.profile.edit') }}" class="flex flex-row items-center h-10 px-3 rounded-lg text-white {{ request()->routeIs('admin.profile.*') ? 'bg-primary-700' : 'hover:bg-primary-700' }}">
                    <i class="fas fa-user-cog mr-3"></i>
                    <span class="ml-3">Mon profil</span>
                </a>
            </li>
            
            <li class="my-px">
                <form action="{{ route('logout') }}" method="POST" class="flex flex-row items-center h-10 px-3 rounded-lg text-white hover:bg-primary-700">
                    @csrf
                    <button type="submit" class="flex flex-row items-center w-full">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        <span class="ml-3">Déconnexion</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside> 