<footer class="bg-custom-secondary text-white mt-12 pt-12 pb-8 relative overflow-hidden">
    <!-- Élément décoratif -->
    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-custom-primary via-blue-400 to-purple-500"></div>
    
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Logo et description -->
            <div class="col-span-1 md:col-span-2">
                <div class="mb-3 transform hover:scale-105 transition-transform duration-300" style="background-color: #fefefe; width: 90px; padding: 5px; border-radius: 15px;">
                    <img src="{{asset('img/logo.png')}}" alt="Logo Un Jeune Une Compétence" class="img-fluid" style="width: 90px;">
                </div>
                <h3 class="text-xl font-bold mb-4 relative inline-block">
                    Un Jeune Une Compétence
                    <span class="absolute bottom-0 left-0 w-1/2 h-1 bg-custom-primary"></span>
                </h3>
                <p class="text-gray-300 mb-6" style="max-width: 350px;">
                    Des formations pour tous les horizons. Développez vos compétences grâce à nos programmes axés sur les besoins du marché.
                </p>
                <div class="flex space-x-5">
                    <a href="#" class="text-white hover:text-custom-primary transition-all duration-300 transform hover:scale-110">
                        <i class="fab fa-facebook-f text-lg"></i>
                    </a>
                    <a href="#" class="text-white hover:text-custom-primary transition-all duration-300 transform hover:scale-110">
                        <i class="fab fa-twitter text-lg"></i>
                    </a>
                    <a href="#" class="text-white hover:text-custom-primary transition-all duration-300 transform hover:scale-110">
                        <i class="fab fa-instagram text-lg"></i>
                    </a>
                    <a href="#" class="text-white hover:text-custom-primary transition-all duration-300 transform hover:scale-110">
                        <i class="fab fa-linkedin-in text-lg"></i>
                    </a>
                </div>
            </div>
            
            <!-- Liens rapides -->
            <div>
                <h4 class="text-lg font-semibold mb-4 relative inline-block">
                    Liens rapides
                    <span class="absolute bottom-0 left-0 w-1/2 h-1 bg-custom-primary"></span>
                </h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right mr-2 text-xs text-custom-primary"></i>Accueil</a></li>
                    <li><a href="{{ route('formations.index') }}" class="text-gray-300 hover:text-white transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right mr-2 text-xs text-custom-primary"></i>Formations</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right mr-2 text-xs text-custom-primary"></i>À propos</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-white transition-colors duration-300 flex items-center"><i class="fas fa-chevron-right mr-2 text-xs text-custom-primary"></i>Contact</a></li>
                </ul>
            </div>
            
            <!-- Contact -->
            <div>
                <h4 class="text-lg font-semibold mb-4 relative inline-block">
                    Contact
                    <span class="absolute bottom-0 left-0 w-1/2 h-1 bg-custom-primary"></span>
                </h4>
                <address class="not-italic text-gray-300">
                    <p class="flex items-start mb-3 group">
                        <i class="fas fa-map-marker-alt mr-3 mt-1 text-custom-primary group-hover:text-white transition-colors duration-300"></i>
                        <span class="group-hover:text-white transition-colors duration-300">123 Rue des Formations, Abidjan, Côte d'Ivoire</span>
                    </p>
                    <p class="flex items-center mb-3 group">
                        <i class="fas fa-phone-alt mr-3 text-custom-primary group-hover:text-white transition-colors duration-300"></i>
                        <span class="group-hover:text-white transition-colors duration-300">+225 07 12 34 56 78</span>
                    </p>
                    <p class="flex items-center group">
                        <i class="fas fa-envelope mr-3 text-custom-primary group-hover:text-white transition-colors duration-300"></i>
                        <span class="group-hover:text-white transition-colors duration-300">contact@unjeunecompetence.ci</span>
                    </p>
                </address>
            </div>
        </div>
        
        <hr class="border-gray-700 my-8">
        
        <div class="flex flex-col md:flex-row justify-between items-center text-gray-400">
            <p class="mb-3 md:mb-0">&copy; {{ date('Y') }} Un Jeune Une Compétence. Tous droits réservés.</p>
            <p class="flex items-center text-white">
                <span>Site fait avec <i class="fas fa-heart text-xs ml-1 animate-pulse"></i> par </span>
                <a href="#" class="ml-1 text-custom-primary hover:text-white transition-colors duration-300 flex items-center font-medium">
                    Thuppers Inc
                    
                </a>
            </p>
        </div>
    </div>
</footer>