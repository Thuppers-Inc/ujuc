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
        
        /* Style pour le popup modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
        
        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        
        .modal-container {
            background-color: white;
            width: 90%;
            max-width: 500px;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            transform: scale(0.8);
            opacity: 0;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }
        
        .modal-overlay.active .modal-container {
            transform: scale(1);
            opacity: 1;
        }
        
        .modal-header {
            background-color: var(--accent);
            padding: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 3px solid var(--primary);
        }
        
        .modal-header h3 {
            color: var(--secondary);
            font-weight: 700;
            margin: 0;
            font-size: 1.25rem;
            display: flex;
            align-items: center;
        }
        
        .modal-header .modal-close {
            background: none;
            border: none;
            color: var(--secondary);
            font-size: 1.5rem;
            cursor: pointer;
            transition: transform 0.2s ease;
        }
        
        .modal-header .modal-close:hover {
            transform: rotate(90deg);
        }
        
        .modal-body {
            padding: 1.5rem;
            color: var(--secondary);
        }
        
        .modal-footer {
            padding: 1rem 1.5rem;
            background-color: #f8f9fa;
            display: flex;
            justify-content: flex-end;
        }
        
        .modal-btn {
            background-color: var(--primary);
            color: white;
            padding: 0.5rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .modal-btn:hover {
            background-color: #e05f21;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(242, 116, 56, 0.25);
        }
        
        .alert-icon {
            font-size: 1.25rem;
            margin-right: 0.75rem;
            color: var(--primary);
        }
    </style>
    
    <!-- Custom Styles -->
    @stack('styles')
</head>
<body class="min-h-screen bg-gray-50 flex flex-col">
    <!-- Popup Modal -->
    <div class="modal-overlay" id="alertModal">
        <div class="modal-container">
            <div class="modal-header">
                <h3>
                    <i class="fas fa-exclamation-triangle alert-icon"></i>
                    Information importante
                </h3>
                <button class="modal-close" onclick="closeModal()">&times;</button>
            </div>
            <div class="modal-body">
                <p class="text-lg font-medium">Aucune somme n'est exigée lors de l'inscription, merci de dénoncer toute extorsion.</p>
            </div>
            <div class="modal-footer">
                <button class="modal-btn" onclick="closeModal()">J'ai compris</button>
            </div>
        </div>
    </div>
    
    <!-- Header -->
    @include('site.partials.header')
    
    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>
    
    <!-- Footer -->
    @include('site.partials.footer')
    
    <!-- Scripts -->
    <script>
        function showModal() {
            document.getElementById('alertModal').classList.add('active');
        }
        
        function closeModal() {
            document.getElementById('alertModal').classList.remove('active');
            // Stocker que le modal a été fermé
            localStorage.setItem('alertModalClosed', 'true');
        }
        
        // Afficher le modal au chargement de la page si pas déjà fermé
        document.addEventListener('DOMContentLoaded', function() {
            if (!localStorage.getItem('alertModalClosed')) {
                // Petit délai pour que le modal s'affiche après le chargement de la page
                setTimeout(showModal, 800);
            }
        });
    </script>
    @stack('scripts')
</body>
</html> 