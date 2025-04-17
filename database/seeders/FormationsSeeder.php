<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Formation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FormationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Récupération des catégories existantes
        // Si aucune catégorie n'existe, on en crée une par défaut
        $categories = Categorie::all();
        if ($categories->isEmpty()) {
            $informatique = Categorie::create([
                'nom' => 'Informatique',
                'slug' => 'informatique',
                'description' => 'Formations en informatique et technologies numériques',
            ]);
            
            $management = Categorie::create([
                'nom' => 'Management',
                'slug' => 'management', 
                'description' => 'Formations en gestion d\'équipe et leadership',
            ]);
            
            $langues = Categorie::create([
                'nom' => 'Langues étrangères',
                'slug' => 'langues-etrangeres',
                'description' => 'Formations en langues étrangères pour tous niveaux',
            ]);
            
            $marketing = Categorie::create([
                'nom' => 'Marketing Digital',
                'slug' => 'marketing-digital',
                'description' => 'Formations en marketing en ligne et stratégies digitales',
            ]);
            
            $artisanat = Categorie::create([
                'nom' => 'Artisanat',
                'slug' => 'artisanat',
                'description' => 'Formations en artisanat et métiers manuels traditionnels',
            ]);
            
            $categories = Categorie::all();
        }
        
        // Création des formations
        $formations = [
            [
                'titre' => 'Développement Web avec Laravel',
                'description' => 'Apprenez à créer des applications web modernes avec le framework PHP Laravel, l\'un des frameworks les plus populaires et les plus puissants pour le développement web.',
                'contenu' => "Programme de formation:

Jour 1 : Introduction à Laravel
- Présentation du framework et de l'architecture MVC
- Installation et configuration de l'environnement
- Les routes et les contrôleurs
- Exercices pratiques

Jour 2 : Bases de données et Eloquent ORM
- Migrations et modèles
- Relations entre les tables
- Requêtes avancées
- Construction d'une API RESTful

Jour 3 : Front-end et interfaces
- Blade, le moteur de templates
- Intégration de JavaScript et CSS
- Authentication et autorisation
- Déploiement d'une application

Jour 4 : Projet pratique
- Développement d'une application complète
- Bonnes pratiques et optimisation
- Tests et débogage
- Mise en production",
                'duree_jours' => 4,
                'categorie_id' => $categories->where('nom', 'Informatique')->first()->id ?? $categories->first()->id,
            ],
            [
                'titre' => 'Leadership et gestion d\'équipe',
                'description' => 'Développez vos compétences en leadership pour gérer efficacement votre équipe, améliorer la communication et augmenter la productivité collective.',
                'contenu' => "Programme de formation:

Jour 1 : Fondements du leadership
- Styles de leadership et leur impact
- Communication efficace
- Gestion des conflits
- Études de cas

Jour 2 : Motivation et engagement
- Techniques de motivation d'équipe
- Feedback constructif
- Délégation efficace
- Reconnaissance et valorisation

Jour 3 : Gestion de projet en équipe
- Planification et organisation
- Suivi de performance
- Prise de décision collaborative
- Gestion du changement

Jour 4 et 5 : Ateliers pratiques
- Simulations de situations réelles
- Jeux de rôles
- Coaching individuel
- Plan d'action personnalisé",
                'duree_jours' => 5,
                'categorie_id' => $categories->where('nom', 'Management')->first()->id ?? $categories->first()->id,
            ],
            [
                'titre' => 'Anglais professionnel - Niveau intermédiaire',
                'description' => 'Améliorez votre niveau d\'anglais dans un contexte professionnel. Cette formation intensive vous permettra de communiquer efficacement en anglais dans votre environnement de travail.',
                'contenu' => "Programme de formation:

Semaine 1 : Communication orale
- Présentations professionnelles
- Participation aux réunions
- Conversations téléphoniques
- Négociation et argumentation

Semaine 2 : Communication écrite
- Rédaction d'emails professionnels
- Rapports et documents formels
- Notes de service et comptes-rendus
- Vocabulaire spécifique à votre secteur

Semaine 3 : Compétences interculturelles
- Différences culturelles en milieu professionnel
- Étiquette des affaires internationales
- Adaptation aux différents styles de communication
- Travail efficace dans des équipes multiculturelles

Chaque jour inclut:
- 3 heures de cours en groupe
- 1 heure de pratique en situation réelle
- Exercices individuels et évaluations régulières",
                'duree_jours' => 15,
                'categorie_id' => $categories->where('nom', 'Langues étrangères')->first()->id ?? $categories->first()->id,
            ],
            [
                'titre' => 'Stratégies de Marketing Digital',
                'description' => 'Maîtrisez les techniques avancées du marketing numérique pour développer votre présence en ligne, attirer plus de clients et augmenter vos conversions.',
                'contenu' => "Programme de formation:

Jour 1 : Fondements du marketing digital
- Écosystème digital et tendances actuelles
- Identification et analyse des cibles
- Création d'une stratégie omnicanale
- Mesure de performance et KPIs

Jour 2 : Référencement et contenu
- SEO technique et éditorial
- Content marketing efficace
- Stratégie de liens et autorité de domaine
- Référencement local et vocal

Jour 3 : Publicité en ligne et réseaux sociaux
- Google Ads et Meta Ads
- Campagnes de remarketing
- Stratégies avancées pour les réseaux sociaux
- Marketing d'influence

Jour 4 : Analyse de données et optimisation
- Google Analytics avancé
- Tests A/B et optimisation de conversion
- Automatisation marketing
- Personnalisation et expérience utilisateur

Exercices pratiques tout au long de la formation avec application sur votre propre projet.",
                'duree_jours' => 4,
                'categorie_id' => $categories->where('nom', 'Marketing Digital')->first()->id ?? $categories->first()->id,
            ],
            [
                'titre' => 'Initiation à la poterie traditionnelle',
                'description' => 'Découvrez l\'art ancestral de la poterie. Cette formation pratique vous initiera aux techniques fondamentales pour créer vos propres pièces en céramique.',
                'contenu' => "Programme de formation:

Jour 1 : Introduction à la poterie
- Histoire et évolution des techniques
- Les différents types d'argile
- Outils et équipements nécessaires
- Préparation de l'argile

Jour 2 : Techniques de façonnage manuel
- Technique du colombin
- Technique de la plaque
- Modelage et sculpture simple
- Séchage et préparation pour la cuisson

Jour 3 : Tournage (initiation)
- Principes de base du tour de potier
- Centrage de l'argile
- Montée du cylindre
- Création de formes simples

Jour 4 : Décoration et finition
- Techniques d'émaillage
- Application d'engobes
- Incisions et textures
- Cuisson et finitions

Chaque participant repartira avec ses créations après cuisson.
Matériel et équipement fournis pendant la formation.",
                'duree_jours' => 4,
                'categorie_id' => $categories->where('nom', 'Artisanat')->first()->id ?? $categories->first()->id,
            ],
        ];

        foreach ($formations as $formation) {
            // Vérifier si la formation existe déjà (basé sur le titre)
            if (!Formation::where('titre', $formation['titre'])->exists()) {
                Formation::create(array_merge($formation, [
                    'slug' => Str::slug($formation['titre']),
                ]));
            }
        }

        $this->command->info('5 formations ont été créées avec succès !');
    }
} 