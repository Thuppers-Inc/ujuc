<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Un Jeune Une Compétence - Administration">
    <title>Connexion | Administration</title>
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('build/assets/app-DOULAb8F.css') }}">
    <script src="{{ asset('build/assets/app-eMHK6VFw.js') }}" defer></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-orange-500 to-orange-600 p-6 text-white">
            <h1 class="text-3xl font-bold text-white">Un Jeune Une Compétence</h1>
            <p class="mt-2 text-white">Espace Administration</p>
        </div>
        
        <div class="p-8">
            @if (session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md flex items-start">
                    <i class="fas fa-exclamation-circle mr-3 mt-0.5"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif
            
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        <i class="fas fa-envelope mr-2 text-gray-500"></i>Adresse e-mail
                    </label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 bg-white text-gray-800">
                    
                    @error('email')
                        <p class="text-red-500 text-sm mt-1 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </p>
                    @enderror
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        <i class="fas fa-lock mr-2 text-gray-500"></i>Mot de passe
                    </label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 bg-white text-gray-800">
                    
                    @error('password')
                        <p class="text-red-500 text-sm mt-1 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </p>
                    @enderror
                </div>
                
                <div class="flex items-center">
                    <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}
                        class="h-4 w-4 rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                    
                    <label for="remember" class="ml-3 block text-sm text-gray-700">
                        Se souvenir de moi
                    </label>
                </div>
                
                <div>
                    <button type="submit" class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-orange-500 hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-colors duration-200">
                        <i class="fas fa-sign-in-alt mr-2"></i>Se connecter
                    </button>
                </div>
            </form>
            
            <div class="mt-8 pt-4 border-t border-gray-200 text-center text-gray-600 text-sm">
                <p>© {{ date('Y') }} Un Jeune Une Compétence. Tous droits réservés.</p>
            </div>
        </div>
    </div>
</body>
</html> 