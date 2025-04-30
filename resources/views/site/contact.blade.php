@extends('site.layouts.app')

@section('title', 'Contactez-nous')




@section('content')
    <!-- Contact Hero Section -->
    <x-site.formations-hero title="Contactez-nous" description="Nous sommes là pour répondre à toutes vos questions concernant nos formations et vous aider dans votre parcours professionnel.">
        {{-- <a href="#formations-list" class="bg-white text-orange-500 hover:bg-gray-100 transition-all duration-300 font-medium py-2 px-6 rounded-md shadow-md inline-flex items-center">
            <i class="fas fa-search mr-2"></i>Explorer nos formations
        </a> --}}
    </x-site.formations-hero>



    <!-- Contact Details Section -->
    <section class="py-16 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-gradient-to-br from-orange-50 to-white p-8 rounded-xl shadow-md border border-orange-100">
                    <h3 class="text-2xl font-bold mb-6 text-custom-secondary">Envoyez-nous un message</h3>
                    <form action="#" method="POST" class="space-y-6">
                        <div>
                            <label for="name" class="block text-gray-700 mb-2">Nom complet</label>
                            <input type="text" id="name" name="name" placeholder="Votre nom" class="w-full px-4 py-3 border border-orange-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary bg-white">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" name="email" placeholder="votre@email.com" class="w-full px-4 py-3 border border-orange-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary bg-white">
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-gray-700 mb-2">Sujet</label>
                            <input type="text" id="subject" name="subject" placeholder="Sujet de votre message" class="w-full px-4 py-3 border border-orange-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary bg-white">
                        </div>
                        
                        <div>
                            <label for="message" class="block text-gray-700 mb-2">Message</label>
                            <textarea id="message" name="message" rows="5" placeholder="Votre message" class="w-full px-4 py-3 border border-orange-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-custom-primary bg-white"></textarea>
                        </div>
                        
                        <div>
                            <button type="submit" class="bg-custom-primary text-white font-semibold py-3 px-6 rounded-lg hover:bg-custom-dark transition-all duration-300 shadow-lg hover:shadow-xl">
                                Envoyer le message
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Contact Info -->
                <div class="bg-gradient-to-tr from-gray-50 to-white p-8 rounded-xl shadow-md border border-gray-100">
                    <h3 class="text-2xl font-bold mb-6 text-custom-secondary">Nos coordonnées</h3>
                    
                    <div class="space-y-8">
                        <div class="flex p-4 bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300">
                            <div class="flex-shrink-0 mr-4">
                                <div class="bg-custom-primary bg-opacity-20 w-12 h-12 rounded-full flex items-center justify-center shadow-inner">
                                    <i class="fas fa-map-marker-alt text-custom-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold mb-1 text-custom-secondary">Adresse</h4>
                                <p class="text-gray-600">123 Rue de la Formation, Abidjan, Côte d'Ivoire</p>
                            </div>
                        </div>
                        
                        <div class="flex p-4 bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300">
                            <div class="flex-shrink-0 mr-4">
                                <div class="bg-custom-primary bg-opacity-20 w-12 h-12 rounded-full flex items-center justify-center shadow-inner">
                                    <i class="fas fa-phone-alt text-custom-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold mb-1 text-custom-secondary">Téléphone</h4>
                                <p class="text-gray-600">+225 07 07 07 07 07</p>
                                <p class="text-gray-600">+225 05 05 05 05 05</p>
                            </div>
                        </div>
                        
                        <div class="flex p-4 bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300">
                            <div class="flex-shrink-0 mr-4">
                                <div class="bg-custom-primary bg-opacity-20 w-12 h-12 rounded-full flex items-center justify-center shadow-inner">
                                    <i class="fas fa-envelope text-custom-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold mb-1 text-custom-secondary">Email</h4>
                                <p class="text-gray-600">contact@ujuc.com</p>
                                <p class="text-gray-600">info@ujuc.com</p>
                            </div>
                        </div>
                        
                        <div class="flex p-4 bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300">
                            <div class="flex-shrink-0 mr-4">
                                <div class="bg-custom-primary bg-opacity-20 w-12 h-12 rounded-full flex items-center justify-center shadow-inner">
                                    <i class="fas fa-clock text-custom-primary"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold mb-1 text-custom-secondary">Heures d'ouverture</h4>
                                <p class="text-gray-600">Lundi - Vendredi: 8h00 - 18h00</p>
                                <p class="text-gray-600">Samedi: 9h00 - 14h00</p>
                            </div>
                        </div>
                        
                        <div class="pt-4 bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-lg font-semibold mb-3 text-custom-secondary">Suivez-nous</h4>
                            <div class="flex space-x-4">
                                <a href="#" class="bg-custom-primary bg-opacity-20 w-10 h-10 rounded-full flex items-center justify-center text-custom-primary hover:bg-custom-primary hover:text-white transition-all duration-300 shadow-sm hover:shadow-md">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="bg-custom-primary bg-opacity-20 w-10 h-10 rounded-full flex items-center justify-center text-custom-primary hover:bg-custom-primary hover:text-white transition-all duration-300 shadow-sm hover:shadow-md">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="bg-custom-primary bg-opacity-20 w-10 h-10 rounded-full flex items-center justify-center text-custom-primary hover:bg-custom-primary hover:text-white transition-all duration-300 shadow-sm hover:shadow-md">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="bg-custom-primary bg-opacity-20 w-10 h-10 rounded-full flex items-center justify-center text-custom-primary hover:bg-custom-primary hover:text-white transition-all duration-300 shadow-sm hover:shadow-md">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Map Section -->
    <section class="py-8 bg-gradient-to-t from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="bg-gray-200 rounded-xl overflow-hidden h-96 shadow-lg">
                <!-- Remplacer par une carte Google Maps réelle avec l'API -->
                <div class="w-full h-full flex items-center justify-center bg-gray-300">
                    <div class="text-center">
                        <i class="fas fa-map-marked-alt text-5xl text-gray-500 mb-4"></i>
                        <p class="text-gray-700">Carte Google Maps à intégrer ici</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Script pour la validation du formulaire ou l'intégration de Google Maps peut être ajouté ici
</script>
@endpush 