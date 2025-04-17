<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Un Jeune Une Compétence - Formations pour tous les horizons. Développez vos compétences avec nos programmes axés sur les besoins du marché.">
    <title>@yield('title', 'Un Jeune Une Compétence') | Formation professionnelle</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('build/assets/app-DOULAb8F.css') }}">
    <script src="{{ asset('build/assets/app-eMHK6VFw.js') }}" defer></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    
    <!-- Global Custom Styles -->
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
        
        .btn-custom-outline {
            background-color: transparent;
            color: var(--primary);
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
            text-align: center;
            border: 2px solid var(--primary);
        }
        
        .btn-custom-outline:hover {
            background-color: var(--primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(242, 116, 56, 0.25);
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
    </style>
    
    <!-- Custom Styles -->
    @stack('styles')
</head>
<body class="min-h-screen bg-gray-50 flex flex-col">
    <!-- Header -->
    @include('site.partials.header')
    
    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('site.partials.footer')
    
    <!-- Scripts -->
    @stack('scripts')
</body>
</html> 