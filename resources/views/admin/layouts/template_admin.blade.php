<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Un Jeune Une Compétence - Administration">
    <title>@yield('title', 'Administration') | Un Jeune Une Compétence</title>
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('build/assets/app-4p6RJ_X0.css') }}">
    <script src="{{ asset('build/assets/app-eMHK6VFw.js') }}" defer></script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
        
        /* Layout */
        .admin-layout {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #1e293b;
            color: #f8fafc;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 40;
            transition: transform 0.3s ease;
        }
        
        .sidebar-header {
            padding: 1.25rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-content {
            padding: 1.25rem 0;
            height: calc(100% - 70px - 80px); /* Hauteur totale moins header et footer */
            overflow-y: auto;
        }
        
        .sidebar-footer {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 1.25rem;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        
        .sidebar-section {
            margin-bottom: 1.5rem;
            padding: 0 1.25rem;
        }
        
        .sidebar-heading {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            color: #94a3b8;
            letter-spacing: 0.05em;
            margin-bottom: 0.75rem;
        }
        
        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 0.625rem 1rem;
            color: #e2e8f0;
            font-size: 0.875rem;
            border-radius: 0.375rem;
            margin-bottom: 0.25rem;
            transition: background-color 0.2s;
        }
        
        .sidebar-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-link.active {
            background-color: #3b82f6;
            color: white;
        }
        
        .sidebar-link i {
            width: 1.25rem;
            margin-right: 0.75rem;
            text-align: center;
        }
        
        /* Content */
        .content-wrapper {
            flex: 1;
            margin-left: 250px;
            transition: margin-left 0.3s ease;
        }
        
        /* Header */
        .admin-header {
            background-color: white;
            border-bottom: 1px solid #e5e7eb;
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1e293b;
        }
        
        /* Main content */
        .admin-main {
            padding: 1.5rem;
        }
        
        /* Cards */
        .card {
            background-color: white;
            border-radius: 0.5rem;
        }
        
        .card-header {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .card-title {
            font-size: 1rem;
            font-weight: 600;
            color: #1e293b;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.open {
                transform: translateX(0);
            }
            
            .content-wrapper {
                margin-left: 0;
            }
            
            .overlay {
                display: none;
                position: fixed;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 30;
            }
            
            .overlay.show {
                display: block;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <div x-data="{ 
         sidebarOpen: window.innerWidth >= 1024,
         toggleSidebar() { this.sidebarOpen = !this.sidebarOpen },
         closeSidebarOnMobile() { if (window.innerWidth < 1024) this.sidebarOpen = false }
     }" 
     @resize.window="sidebarOpen = window.innerWidth >= 1024">
        <!-- Overlay -->
        <div class="overlay" :class="{ 'show': sidebarOpen && window.innerWidth < 1024 }" @click="toggleSidebar"></div>
        
        <!-- Layout container -->
        <div class="admin-layout">
            <!-- Sidebar -->
            <aside class="sidebar" :class="{ 'open': sidebarOpen }">
                <!-- Logo -->
                <div class="sidebar-header">
                    <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold tracking-wider">
                        <span class="text-blue-400">UJUC</span> Admin
                    </a>
                </div>
                
                <!-- Navigation -->
                <div class="sidebar-content">
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}" 
                       class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                       @click="closeSidebarOnMobile">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Tableau de bord</span>
                    </a>
                    
                    <!-- Gestion Section -->
                    <div class="sidebar-section">
                        <p class="sidebar-heading">Gestion</p>
                        
                        <a href="{{ route('admin.categories.index') }}" 
                           class="sidebar-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}"
                           @click="closeSidebarOnMobile">
                            <i class="fas fa-folder"></i>
                            <span>Catégories</span>
                        </a>
                        
                        <a href="{{ route('admin.formations.index') }}" 
                           class="sidebar-link {{ request()->routeIs('admin.formations.*') ? 'active' : '' }}"
                           @click="closeSidebarOnMobile">
                            <i class="fas fa-graduation-cap"></i>
                            <span>Formations</span>
                        </a>
                        
                        <a href="{{ route('admin.inscriptions.index') }}" 
                           class="sidebar-link {{ request()->routeIs('admin.inscriptions.*') ? 'active' : '' }}"
                           @click="closeSidebarOnMobile">
                            <i class="fas fa-users"></i>
                            <span>Inscriptions</span>
                            @if($nbInscriptionsEnAttente = \App\Models\Inscription::where('statut', 'en_attente')->count())
                                <span class="ml-auto bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                                    {{ $nbInscriptionsEnAttente }}
                                </span>
                            @endif
                        </a>
                    </div>
                    
                    <!-- Analyse Section -->
                    <div class="sidebar-section">
                        <p class="sidebar-heading">Analyse</p>
                        
                        <a href="{{ route('admin.statistiques') }}" 
                           class="sidebar-link {{ request()->routeIs('admin.statistiques') ? 'active' : '' }}"
                           @click="closeSidebarOnMobile">
                            <i class="fas fa-chart-bar"></i>
                            <span>Statistiques</span>
                        </a>
                    </div>
                    
                    <!-- Paramètres Section -->
                    <div class="sidebar-section">
                        <p class="sidebar-heading">Paramètres</p>
                        
                        <a href="{{ route('admin.profile.edit') }}" 
                           class="sidebar-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}"
                           @click="closeSidebarOnMobile">
                            <i class="fas fa-user-cog"></i>
                            <span>Mon profil</span>
                        </a>
                    </div>
                    
                    <!-- Site public -->
                    <div class="sidebar-section">
                        <a href="{{ route('home') }}" class="sidebar-link" target="_blank">
                            <i class="fas fa-globe"></i>
                            <span>Visiter le site</span>
                        </a>
                    </div>
                </div>
                
                <!-- User profile -->
                <div class="sidebar-footer">
                    <div class="flex items-center">
                        <div class="h-8 w-8 rounded-full bg-gray-700 flex items-center justify-center text-white">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-400">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>
            </aside>
            
            <!-- Content -->
            <div class="content-wrapper">
                <!-- Header -->
                <header class="admin-header">
                    <div class="flex items-center">
                        <button @click="toggleSidebar" class="mr-4 text-gray-500 md:hidden">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <h1 class="header-title">@yield('header', 'Dashboard')</h1>
                    </div>
                    
                    <!-- User menu -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center">
                            <span class="mr-2 text-sm font-medium">{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down text-xs text-gray-500"></i>
                        </button>
                        
                        <div x-show="open" 
                             @click.away="open = false"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-48 py-1 bg-white rounded-md shadow-lg z-10"
                             style="display: none;">
                            <a href="{{ route('admin.profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-user-cog mr-2"></i> Mon profil
                            </a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>
                </header>
                
                <!-- Main content -->
                <main class="admin-main">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    
    @stack('scripts')
</body>
</html> 