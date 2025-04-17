<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Formation;
use Illuminate\Database\Seeder;

class FormationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formationsParCategorie = [
            'AGRICULTURE/ELEVAGE' => [
                [
                    'titre' => 'Culture du manioc',
                    'description' => 'Apprenez les techniques modernes de culture du manioc pour optimiser votre rendement.',
                    'contenu' => "Programme de la formation :\n\n- Introduction à la culture du manioc\n- Préparation du sol et sélection des boutures\n- Techniques de plantation\n- Entretien et protection des cultures\n- Récolte et conservation\n- Commercialisation et transformation",
                    'duree_jours' => 15,
                ],
                [
                    'titre' => 'Maraîchage',
                    'description' => 'Formation complète sur les cultures maraîchères : tomates, piments, gombos, aubergines, salades, carottes, oignons.',
                    'contenu' => "Programme de la formation :\n\n- Introduction au maraîchage\n- Préparation du sol et sélection des semences\n- Techniques de plantation\n- Entretien et protection des cultures\n- Récolte et conservation\n- Commercialisation",
                    'duree_jours' => 20,
                ],
                [
                    'titre' => 'Riziculture',
                    'description' => 'Maîtrisez les techniques de culture du riz pour améliorer votre production et votre rentabilité.',
                    'contenu' => "Programme de la formation :\n\n- Introduction à la riziculture\n- Préparation du sol et sélection des semences\n- Techniques de plantation\n- Irrigation et gestion de l'eau\n- Entretien et protection des cultures\n- Récolte et conservation\n- Commercialisation",
                    'duree_jours' => 18,
                ],
                [
                    'titre' => 'Cultures pérennes',
                    'description' => 'Formation sur les cultures pérennes : cacao, cajou, palmier à huile, hévéa.',
                    'contenu' => "Programme de la formation :\n\n- Introduction aux cultures pérennes\n- Préparation du sol et sélection des plants\n- Techniques de plantation\n- Entretien et protection des cultures\n- Récolte et conservation\n- Commercialisation",
                    'duree_jours' => 25,
                ],
                [
                    'titre' => 'Aviculture',
                    'description' => 'Apprenez à élever des poulets locaux, hybrides, pondeuses et poulets de chair.',
                    'contenu' => "Programme de la formation :\n\n- Introduction à l'aviculture\n- Choix des races et acquisition des poussins\n- Construction et aménagement du poulailler\n- Alimentation et abreuvement\n- Santé et prévention des maladies\n- Gestion de la production d'œufs\n- Commercialisation",
                    'duree_jours' => 15,
                ],
                [
                    'titre' => 'Élevage porcin',
                    'description' => 'Formation complète sur l\'élevage porcin, de l\'installation à la commercialisation.',
                    'contenu' => "Programme de la formation :\n\n- Introduction à l'élevage porcin\n- Choix des races et acquisition des porcelets\n- Construction et aménagement de la porcherie\n- Alimentation et abreuvement\n- Santé et prévention des maladies\n- Reproduction et gestion de la mise bas\n- Commercialisation",
                    'duree_jours' => 15,
                ],
                [
                    'titre' => 'Élevage d\'escargots',
                    'description' => 'Découvrez les techniques d\'élevage d\'escargots, un secteur rentable et peu concurrentiel.',
                    'contenu' => "Programme de la formation :\n\n- Introduction à l'héliciculture\n- Choix des espèces et acquisition des reproducteurs\n- Construction et aménagement de l'escargotière\n- Alimentation\n- Santé et prévention des maladies\n- Reproduction et croissance\n- Commercialisation",
                    'duree_jours' => 10,
                ],
                [
                    'titre' => 'Élevage de lapins',
                    'description' => 'Apprenez à élever des lapins de manière professionnelle et rentable.',
                    'contenu' => "Programme de la formation :\n\n- Introduction à la cuniculture\n- Choix des races et acquisition des reproducteurs\n- Construction et aménagement du clapier\n- Alimentation\n- Santé et prévention des maladies\n- Reproduction et gestion des portées\n- Commercialisation",
                    'duree_jours' => 12,
                ],
                [
                    'titre' => 'Aquaculture',
                    'description' => 'Formation complète sur l\'élevage de poissons en bassins et en étangs.',
                    'contenu' => "Programme de la formation :\n\n- Introduction à l'aquaculture\n- Choix des espèces et acquisition des alevins\n- Construction et aménagement des bassins\n- Alimentation\n- Qualité de l'eau et gestion des paramètres\n- Santé et prévention des maladies\n- Reproduction\n- Commercialisation",
                    'duree_jours' => 20,
                ],
            ],
            'TECH-NUMERIQUE' => [
                [
                    'titre' => 'Infographie',
                    'description' => 'Maîtrisez les logiciels de création graphique et développez votre créativité.',
                    'contenu' => "Programme de la formation :\n\n- Introduction à l'infographie\n- Photoshop : retouche d'images et photomontage\n- Illustrator : dessin vectoriel\n- InDesign : mise en page\n- Création de logos et d'identités visuelles\n- Création de supports de communication\n- Création de visuels pour le web et les réseaux sociaux",
                    'duree_jours' => 30,
                ],
                [
                    'titre' => 'Community Manager',
                    'description' => 'Apprenez à gérer et animer les réseaux sociaux d\'une entreprise ou d\'une marque.',
                    'contenu' => "Programme de la formation :\n\n- Introduction au community management\n- Stratégie de communication digitale\n- Création de contenus pour les réseaux sociaux\n- Gestion de Facebook, Instagram, Twitter, LinkedIn\n- Planification et programmation des publications\n- Analyse des performances et reporting\n- Gestion de crise et e-réputation",
                    'duree_jours' => 20,
                ],
                [
                    'titre' => 'Installation de système de sécurité',
                    'description' => 'Formation aux techniques d\'installation et de maintenance des systèmes de sécurité modernes.',
                    'contenu' => "Programme de la formation :\n\n- Introduction aux systèmes de sécurité\n- Vidéosurveillance : caméras, enregistreurs, moniteurs\n- Alarmes anti-intrusion\n- Contrôle d'accès\n- Détection d'incendie\n- Installation et configuration\n- Maintenance et dépannage",
                    'duree_jours' => 15,
                ],
                [
                    'titre' => 'Réparateur de téléphone',
                    'description' => 'Apprenez à diagnostiquer et réparer les problèmes courants des smartphones.',
                    'contenu' => "Programme de la formation :\n\n- Introduction à la réparation de téléphones\n- Les différents modèles et leurs spécificités\n- Outils et équipements nécessaires\n- Diagnostic des pannes\n- Réparation des écrans cassés\n- Réparation des problèmes de batterie\n- Réparation des problèmes de connectique\n- Mise à jour et flashage des logiciels",
                    'duree_jours' => 15,
                ],
                [
                    'titre' => 'Smart Reporter',
                    'description' => 'Formez-vous au journalisme moderne avec smartphone et réseaux sociaux.',
                    'contenu' => "Programme de la formation :\n\n- Introduction au journalisme mobile\n- Techniques de reportage avec smartphone\n- Prise de vue et montage vidéo sur mobile\n- Enregistrement et montage audio\n- Rédaction pour le web\n- Publication sur les réseaux sociaux\n- Éthique et déontologie journalistique",
                    'duree_jours' => 20,
                ],
                [
                    'titre' => 'Photographe',
                    'description' => 'Développez vos compétences en photographie professionnelle.',
                    'contenu' => "Programme de la formation :\n\n- Introduction à la photographie\n- Maîtrise de l'appareil photo\n- Composition et cadrage\n- Éclairage naturel et artificiel\n- Portrait, paysage, reportage, événementiel\n- Retouche photo avec Lightroom et Photoshop\n- Création d'un portfolio\n- Développement d'une activité professionnelle",
                    'duree_jours' => 30,
                ],
            ],
            'MÉTIERS MANUELS' => [
                [
                    'titre' => 'Électricité bâtiment',
                    'description' => 'Formez-vous aux techniques d\'installation et de maintenance électrique dans le bâtiment.',
                    'contenu' => "Programme de la formation :\n\n- Introduction à l'électricité du bâtiment\n- Lecture de plans et schémas électriques\n- Installation électrique domestique\n- Installation de systèmes d'éclairage\n- Installation de systèmes de sécurité\n- Dépannage et maintenance\n- Normes et sécurité électrique",
                    'duree_jours' => 30,
                ],
                [
                    'titre' => 'Peintre',
                    'description' => 'Maîtrisez les techniques professionnelles de peinture en bâtiment.',
                    'contenu' => "Programme de la formation :\n\n- Introduction aux travaux de peinture\n- Préparation des surfaces\n- Techniques d'application\n- Peintures décoratives\n- Revêtements muraux\n- Organisation d'un chantier\n- Établissement de devis",
                    'duree_jours' => 20,
                ],
                [
                    'titre' => 'Carreleur',
                    'description' => 'Apprenez à poser du carrelage au sol et au mur selon les règles de l\'art.',
                    'contenu' => "Programme de la formation :\n\n- Introduction au métier de carreleur\n- Préparation des supports\n- Techniques de pose au sol\n- Techniques de pose murale\n- Pose de faïence\n- Réalisation de joints\n- Organisation d'un chantier\n- Établissement de devis",
                    'duree_jours' => 25,
                ],
                [
                    'titre' => 'Esthétique',
                    'description' => 'Formation complète aux soins esthétiques et à la beauté.',
                    'contenu' => "Programme de la formation :\n\n- Introduction aux soins esthétiques\n- Soins du visage\n- Soins du corps\n- Épilation\n- Manucure et pédicure\n- Maquillage\n- Conseil et vente de produits\n- Gestion d'un institut de beauté",
                    'duree_jours' => 40,
                ],
                [
                    'titre' => 'Pâtisserie et décoration',
                    'description' => 'Découvrez l\'art de la pâtisserie et de la décoration de gâteaux.',
                    'contenu' => "Programme de la formation :\n\n- Introduction à la pâtisserie\n- Les bases : pâtes, crèmes, mousses\n- Réalisation de gâteaux classiques\n- Réalisation de desserts à l'assiette\n- Décoration et présentation\n- Pâtisserie créative\n- Gestion des coûts et rentabilité\n- Hygiène et sécurité alimentaire",
                    'duree_jours' => 35,
                ],
            ],
            'E-COMMERCE' => [
                [
                    'titre' => 'Création de boutique en ligne',
                    'description' => 'Apprenez à créer et gérer votre propre boutique en ligne.',
                    'contenu' => "Programme de la formation :\n\n- Introduction au e-commerce\n- Création d'un site avec WordPress et WooCommerce\n- Configuration des produits et du catalogue\n- Mise en place des moyens de paiement\n- Gestion des livraisons\n- Aspects juridiques\n- Marketing digital appliqué au e-commerce\n- Analyse des performances",
                    'duree_jours' => 20,
                ],
                [
                    'titre' => 'Marketing digital',
                    'description' => 'Maîtrisez les techniques de marketing en ligne pour développer votre activité.',
                    'contenu' => "Programme de la formation :\n\n- Introduction au marketing digital\n- Référencement naturel (SEO)\n- Publicité en ligne (SEA)\n- Marketing des réseaux sociaux\n- Email marketing\n- Content marketing\n- Analyse des données et reporting\n- Élaboration d'une stratégie digitale",
                    'duree_jours' => 25,
                ],
                [
                    'titre' => 'Stratégie de vente',
                    'description' => 'Développez vos compétences commerciales pour augmenter vos ventes en ligne.',
                    'contenu' => "Programme de la formation :\n\n- Introduction aux techniques de vente\n- Psychologie de l'acheteur en ligne\n- Rédaction persuasive pour le web\n- Techniques de conversion\n- Optimisation du tunnel de vente\n- Fidélisation client\n- Gestion de la relation client\n- Élaboration d'une stratégie commerciale",
                    'duree_jours' => 15,
                ],
                [
                    'titre' => 'Dropshipping',
                    'description' => 'Lancez votre activité de e-commerce sans stock avec le dropshipping (Alibaba, AliExpress).',
                    'contenu' => "Programme de la formation :\n\n- Introduction au dropshipping\n- Recherche de produits rentables\n- Sélection des fournisseurs sur Alibaba et AliExpress\n- Création d'une boutique Shopify\n- Configuration des applications de dropshipping\n- Marketing et acquisition de clients\n- Gestion des commandes et du service client\n- Optimisation et scaling",
                    'duree_jours' => 15,
                ],
            ],
            'LOGISTIQUE/TRANSPORT' => [
                [
                    'titre' => 'VTC',
                    'description' => 'Formez-vous au métier de chauffeur VTC (Voiture de Transport avec Chauffeur).',
                    'contenu' => "Programme de la formation :\n\n- Introduction au métier de chauffeur VTC\n- Réglementation et cadre légal\n- Obtention de la carte professionnelle\n- Création et gestion d'une entreprise VTC\n- Utilisation des plateformes de réservation\n- Technique de conduite professionnelle\n- Relation client et qualité de service\n- Sécurité routière",
                    'duree_jours' => 20,
                ],
                [
                    'titre' => 'Service de livraison',
                    'description' => 'Lancez votre activité de livraison de colis et de repas.',
                    'contenu' => "Programme de la formation :\n\n- Introduction au service de livraison\n- Cadre légal et réglementation\n- Création d'une entreprise de livraison\n- Utilisation des plateformes de livraison\n- Optimisation des tournées\n- Relation client\n- Gestion financière\n- Développement commercial",
                    'duree_jours' => 15,
                ],
                [
                    'titre' => 'Apporteur en transit',
                    'description' => 'Devenez intermédiaire dans le transport de marchandises international.',
                    'contenu' => "Programme de la formation :\n\n- Introduction au transit international\n- Réglementation douanière\n- Documents de transport\n- Incoterms\n- Logistique internationale\n- Négociation commerciale\n- Gestion des risques\n- Développement d'un portefeuille clients",
                    'duree_jours' => 25,
                ],
            ],
            'TECHNOLOGIE' => [
                [
                    'titre' => 'Développeur web/mobile',
                    'description' => 'Formez-vous au développement d\'applications web et mobiles.',
                    'contenu' => "Programme de la formation :\n\n- Introduction au développement web\n- HTML/CSS\n- JavaScript\n- PHP et MySQL\n- Frameworks (Laravel, React)\n- Développement mobile (React Native)\n- Méthodes agiles\n- Déploiement et maintenance\n- Projets pratiques",
                    'duree_jours' => 60,
                ],
                [
                    'titre' => 'Data analyste',
                    'description' => 'Apprenez à analyser et interpréter les données pour aider à la prise de décision.',
                    'contenu' => "Programme de la formation :\n\n- Introduction à la data analyse\n- Statistiques fondamentales\n- Excel avancé\n- SQL et bases de données\n- Python pour l'analyse de données\n- Visualisation de données\n- Business Intelligence\n- Machine Learning initiation\n- Projets pratiques",
                    'duree_jours' => 45,
                ],
                [
                    'titre' => 'Cybersécurité',
                    'description' => 'Maîtrisez les techniques de protection des systèmes informatiques contre les cyberattaques.',
                    'contenu' => "Programme de la formation :\n\n- Introduction à la cybersécurité\n- Sécurité des réseaux\n- Sécurité des systèmes d'exploitation\n- Cryptographie\n- Tests d'intrusion\n- Sécurité des applications web\n- Analyse de malwares\n- Réponse aux incidents\n- Conformité et normes",
                    'duree_jours' => 50,
                ],
                [
                    'titre' => 'Web designer',
                    'description' => 'Développez vos compétences en conception d\'interfaces web ergonomiques et attractives.',
                    'contenu' => "Programme de la formation :\n\n- Introduction au web design\n- UX/UI Design\n- Adobe XD et Figma\n- HTML/CSS avancé\n- Design responsive\n- Animation et interaction\n- Ergonomie web\n- Tendances du design web\n- Projets pratiques",
                    'duree_jours' => 40,
                ],
            ],
            'BATIMENT TRAVAUX PUBLICS' => [
                [
                    'titre' => 'Dessin technique et lecture de plan',
                    'description' => 'Apprenez à lire et réaliser des plans techniques pour le bâtiment.',
                    'contenu' => "Programme de la formation :\n\n- Introduction au dessin technique\n- Normes et conventions\n- Plans architecturaux\n- Plans structurels\n- Plans électriques et plomberie\n- Utilisation d'AutoCAD\n- DAO/CAO\n- Projets pratiques",
                    'duree_jours' => 30,
                ],
                [
                    'titre' => 'Gros œuvre',
                    'description' => 'Formation aux techniques de construction : fondations, murs, planchers, charpentes.',
                    'contenu' => "Programme de la formation :\n\n- Introduction au gros œuvre\n- Lecture de plans\n- Implantation\n- Fondations\n- Murs et cloisons\n- Planchers\n- Charpentes\n- Organisation de chantier\n- Sécurité",
                    'duree_jours' => 45,
                ],
                [
                    'titre' => 'Conduite engin de chantier',
                    'description' => 'Apprenez à conduire et entretenir les engins de chantier.',
                    'contenu' => "Programme de la formation :\n\n- Introduction aux engins de chantier\n- Sécurité et prévention\n- Conduite de pelle mécanique\n- Conduite de bulldozer\n- Conduite de chargeuse\n- Entretien et maintenance\n- Chargement et déchargement\n- Réglementation",
                    'duree_jours' => 25,
                ],
                [
                    'titre' => 'Électricité-plomberie',
                    'description' => 'Double formation aux métiers d\'électricien et de plombier.',
                    'contenu' => "Programme de la formation :\n\n- Introduction à l'électricité et la plomberie\n- Installation électrique\n- Dépannage électrique\n- Installation sanitaire\n- Installation de chauffage\n- Dépannage plomberie\n- Normes et réglementation\n- Projets pratiques",
                    'duree_jours' => 50,
                ],
                [
                    'titre' => 'Froid climatisation',
                    'description' => 'Formez-vous à l\'installation et la maintenance des systèmes de climatisation et de réfrigération.',
                    'contenu' => "Programme de la formation :\n\n- Introduction au froid et à la climatisation\n- Principes thermodynamiques\n- Installation de climatiseurs\n- Installation de systèmes de réfrigération\n- Mise en service\n- Maintenance et dépannage\n- Fluides frigorigènes et environnement\n- Projets pratiques",
                    'duree_jours' => 35,
                ],
                [
                    'titre' => 'Peinture et finition',
                    'description' => 'Maîtrisez les techniques professionnelles de peinture et de finition en bâtiment.',
                    'contenu' => "Programme de la formation :\n\n- Introduction aux travaux de finition\n- Préparation des surfaces\n- Techniques d'application\n- Peintures décoratives\n- Revêtements muraux\n- Finitions spéciales\n- Organisation de chantier\n- Devis et facturation",
                    'duree_jours' => 30,
                ],
                [
                    'titre' => 'Logiciels BTP',
                    'description' => 'Formez-vous aux logiciels indispensables du BTP : AutoCAD, Revit, Microsoft Project, Batiprix, Obat.',
                    'contenu' => "Programme de la formation :\n\n- Introduction aux logiciels BTP\n- AutoCAD : dessin technique\n- Revit : modélisation BIM\n- Microsoft Project : gestion de projet\n- Batiprix : estimation et devis\n- Obat : suivi de chantier\n- Projets pratiques intégrés\n- Optimisation des processus",
                    'duree_jours' => 40,
                ],
            ],
            'FINANCE COMPTA' => [
                [
                    'titre' => 'Mise en place d\'une comptabilité',
                    'description' => 'Apprenez à mettre en place et tenir la comptabilité d\'une entreprise.',
                    'contenu' => "Programme de la formation :\n\n- Introduction à la comptabilité\n- Organisation comptable\n- Plan comptable\n- Saisie des opérations courantes\n- Rapprochement bancaire\n- Déclarations fiscales\n- Clôture des comptes\n- Outils comptables",
                    'duree_jours' => 30,
                ],
                [
                    'titre' => 'Déclaration sociale et fiscale',
                    'description' => 'Maîtrisez les déclarations sociales et fiscales (e-CNPS, e-Impôt).',
                    'contenu' => "Programme de la formation :\n\n- Introduction aux obligations sociales et fiscales\n- Déclarations CNPS via e-CNPS\n- Déclarations fiscales via e-Impôt\n- TVA et autres taxes\n- Impôt sur les sociétés\n- Impôt sur les revenus\n- Calendrier fiscal\n- Optimisation fiscale légale",
                    'duree_jours' => 20,
                ],
                [
                    'titre' => 'La paie',
                    'description' => 'Formez-vous à l\'établissement et à la gestion de la paie.',
                    'contenu' => "Programme de la formation :\n\n- Introduction à la paie\n- Cadre légal du travail\n- Éléments du bulletin de paie\n- Calcul des cotisations sociales\n- Traitement des absences\n- Logiciels de paie\n- Déclarations sociales\n- Cas pratiques",
                    'duree_jours' => 25,
                ],
                [
                    'titre' => 'État financier',
                    'description' => 'Apprenez à établir et analyser les états financiers d\'une entreprise.',
                    'contenu' => "Programme de la formation :\n\n- Introduction aux états financiers\n- Bilan\n- Compte de résultat\n- Tableau de flux de trésorerie\n- Annexes aux états financiers\n- Analyse financière\n- Ratios financiers\n- Reporting financier",
                    'duree_jours' => 25,
                ],
                [
                    'titre' => 'Logiciels comptables',
                    'description' => 'Maîtrisez les logiciels de comptabilité et de paie (Sage Compta & Paie, Odoo).',
                    'contenu' => "Programme de la formation :\n\n- Introduction aux logiciels comptables\n- Sage Compta : paramétrage et utilisation\n- Sage Paie : paramétrage et utilisation\n- Odoo : modules comptables et financiers\n- Odoo : module RH et paie\n- Importation et exportation de données\n- Reporting et tableaux de bord\n- Cas pratiques intégrés",
                    'duree_jours' => 30,
                ],
            ],
        ];

        foreach ($formationsParCategorie as $categorieNom => $formations) {
            $categorie = Categorie::where('nom', $categorieNom)->first();
            
            if ($categorie) {
                foreach ($formations as $formation) {
                    $formation['categorie_id'] = $categorie->id;
                    Formation::create($formation);
                }
            }
        }
    }
} 