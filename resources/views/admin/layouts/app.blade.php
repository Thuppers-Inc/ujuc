<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Un Jeune Une Compétence - Administration">
    <title>@yield('title', 'Administration') | Un Jeune Une Compétence</title>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('build/assets/app-DOULAb8F.css') }}">
    <script src="{{ asset('build/assets/app-eMHK6VFw.js') }}" defer></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }
        
        .sidebar {
            background-color: #1e293b;
            color: #f8fafc;
            width: 260px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 50;
        }
        
        .logo-container {
            background-color: #1e293b;
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-section {
            margin-top: 1.5rem;
            padding: 0 1.25rem;
        }
        
        .sidebar-heading {
            color: #94a3b8;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 0 0.75rem;
            margin-bottom: 0.75rem;
        }
        
        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 0.625rem 0.75rem;
            border-radius: 0.375rem;
            color: #f8fafc;
            font-size: 0.875rem;
            font-weight: 500;
            transition: background-color 0.2s;
            margin-bottom: 0.25rem;
        }
        
        .sidebar-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-link.active {
            background-color: #3b82f6;
        }
        
        .sidebar-link i {
            width: 1.5rem;
            margin-right: 0.75rem;
            text-align: center;
        }
        
        .main-content {
            margin-left: 260px;
            min-height: 100vh;
        }
        
        .top-navbar {
            height: 64px;
            background-color: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            padding: 0 1.5rem;
            justify-content: space-between;
        }
        
        .content {
            padding: 1.5rem;
            background-color: #f8fafc;
        }
        
        .user-profile {
            padding: 1.25rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        
        .mobile-menu-toggle {
            display: none;
        }
        
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.open {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .mobile-menu-toggle {
                display: block;
            }
            
            .overlay {
                background-color: rgba(0, 0, 0, 0.5);
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                z-index: 40;
                opacity: 0;
                visibility: hidden;
                transition: opacity 0.3s ease, visibility 0.3s;
            }
            
            .overlay.show {
                opacity: 1;
                visibility: visible;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <div x-data="{ sidebarOpen: window.innerWidth >= 1024 }">
        <!-- Overlay for mobile -->
        <div 
            @click="sidebarOpen = false" 
            class="overlay" 
            :class="{'show': sidebarOpen && window.innerWidth < 1024}">
        </div>
        
        <!-- Sidebar -->
        <aside class="sidebar" :class="{ 'open': sidebarOpen }">
            <!-- Logo -->
            <div class="logo-container">
                <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold tracking-wider">
                    <span class="text-blue-400">UJUC</span> Admin
                </a>
            </div>
            
            <!-- Menu -->
            <div class="py-4">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}" 
                   class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Tableau de bord</span>
                </a>
                
                <!-- Gestion Section -->
                <div class="sidebar-section">
                    <p class="sidebar-heading">Gestion</p>
                    
                    <a href="{{ route('admin.categories.index') }}" 
                       class="sidebar-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <i class="fas fa-folder"></i>
                        <span>Catégories</span>
                    </a>
                    
                    <a href="{{ route('admin.formations.index') }}" 
                       class="sidebar-link {{ request()->routeIs('admin.formations.*') ? 'active' : '' }}">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Formations</span>
                    </a>
                    
                    <a href="{{ route('admin.inscriptions.index') }}" 
                       class="sidebar-link {{ request()->routeIs('admin.inscriptions.*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i>
                        <span>Inscriptions</span>
                        @if($nbInscriptionsEnAttente = \App\Models\Inscription::where('statut', 'en_attente')->count())
                            <span class="ml-auto bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                                {{ $nbInscriptionsEnAttente }}
                            </span>
                        @endif
                    </a>
                    
                    <a href="{{ route('admin.partenaires.index') }}" 
                       class="sidebar-link {{ request()->routeIs('admin.partenaires.*') ? 'active' : '' }}">
                        <i class="fas fa-handshake"></i>
                        <span>Partenaires</span>
                    </a>
                </div>
                
                <!-- Analyse Section -->
                <div class="sidebar-section">
                    <p class="sidebar-heading">Analyse</p>
                    
                    <a href="{{ route('admin.statistiques') }}" 
                       class="sidebar-link {{ request()->routeIs('admin.statistiques') ? 'active' : '' }}">
                        <i class="fas fa-chart-bar"></i>
                        <span>Statistiques</span>
                    </a>
                </div>
                
                <!-- Paramètres Section -->
                <div class="sidebar-section">
                    <p class="sidebar-heading">Paramètres</p>
                    
                    <a href="{{ route('admin.profile.edit') }}" 
                       class="sidebar-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
                        <i class="fas fa-user-cog"></i>
                        <span>Mon profil</span>
                    </a>
                </div>
                
                <!-- Site link -->
                <div class="sidebar-section">
                    <a href="{{ route('home') }}" class="sidebar-link">
                        <i class="fas fa-globe"></i>
                        <span>Visiter le site</span>
                    </a>
                </div>
            </div>
            
            <!-- User -->
            <div class="user-profile">
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
        
        <!-- Main content -->
        <div class="main-content">
            <!-- Top navbar -->
            <header class="top-navbar">
                <div class="flex items-center">
                    <button 
                        @click="sidebarOpen = !sidebarOpen"
                        class="mobile-menu-toggle mr-4 text-gray-500 focus:outline-none md:hidden"
                    >
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    
                    <h1 class="text-xl font-semibold text-gray-800">@yield('header', 'Dashboard')</h1>
                </div>
                
                <!-- User dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button 
                        @click="open = !open" 
                        class="flex items-center focus:outline-none"
                    >
                        <span class="mr-2 text-sm font-medium">{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down text-xs text-gray-500"></i>
                    </button>
                    
                    <div 
                        x-show="open" 
                        @click.away="open = false"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 mt-2 w-48 py-1 bg-white rounded-md shadow-lg z-10"
                        style="display: none;"
                    >
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
            <main class="content">
                @yield('content')
            </main>
        </div>
    </div>
    
    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Close sidebar when clicking links on mobile
            const sidebarLinks = document.querySelectorAll('.sidebar-link');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 1024) {
                        const sidebar = document.querySelector('.sidebar');
                        sidebar.classList.remove('open');
                    }
                });
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html> 