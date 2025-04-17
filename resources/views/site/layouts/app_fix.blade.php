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