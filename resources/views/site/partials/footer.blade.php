<footer class="bg-custom-secondary text-white mt-12 pt-12 pb-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Logo et description -->
            <div class="col-span-1 md:col-span-2">
                <h3 class="text-xl font-bold mb-4">Un Jeune Une Compétence</h3>
                <p class="text-gray-300 mb-4">
                    Des formations pour tous les horizons. Développez vos compétences grâce à nos programmes axés sur les besoins du marché.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-white hover:text-custom-primary">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-white hover:text-custom-primary">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-white hover:text-custom-primary">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-white hover:text-custom-primary">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
            
            <!-- Liens rapides -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Liens rapides</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white">Accueil</a></li>
                    <li><a href="{{ route('formations.index') }}" class="text-gray-300 hover:text-white">Formations</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">À propos</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-white">Contact</a></li>
                </ul>
            </div>
            
            <!-- Contact -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Contact</h4>
                <address class="not-italic text-gray-300">
                    <p class="flex items-start mb-2">
                        <i class="fas fa-map-marker-alt mr-2 mt-1"></i>
                        <span>123 Rue des Formations, Abidjan, Côte d'Ivoire</span>
                    </p>
                    <p class="flex items-center mb-2">
                        <i class="fas fa-phone-alt mr-2"></i>
                        <span>+225 07 12 34 56 78</span>
                    </p>
                    <p class="flex items-center">
                        <i class="fas fa-envelope mr-2"></i>
                        <span>contact@unjeunecompetence.ci</span>
                    </p>
                </address>
            </div>
        </div>
        
        <hr class="border-gray-700 my-8">
        
        <div class="text-center text-gray-400">
            <p>&copy; {{ date('Y') }} Un Jeune Une Compétence. Tous droits réservés.</p>
        </div>
    </div>
</footer>