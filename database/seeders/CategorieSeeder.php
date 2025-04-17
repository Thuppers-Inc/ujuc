<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'nom' => 'AGRICULTURE/ELEVAGE',
                'description' => 'Découvrez nos formations dans le domaine de l\'agriculture et de l\'élevage pour devenir un professionnel du secteur.',
            ],
            [
                'nom' => 'TECH-NUMERIQUE',
                'description' => 'Formez-vous aux métiers du numérique et de la technologie, des secteurs en pleine expansion.',
            ],
            [
                'nom' => 'MÉTIERS MANUELS',
                'description' => 'Apprenez un métier manuel qui vous permettra de travailler de manière autonome et créative.',
            ],
            [
                'nom' => 'E-COMMERCE',
                'description' => 'Formez-vous aux techniques du commerce en ligne et développez votre activité sur internet.',
            ],
            [
                'nom' => 'LOGISTIQUE/TRANSPORT',
                'description' => 'Découvrez nos formations dans le domaine de la logistique et du transport, secteurs clés de l\'économie.',
            ],
            [
                'nom' => 'TECHNOLOGIE',
                'description' => 'Formez-vous aux technologies de pointe et rejoignez un secteur innovant et dynamique.',
            ],
            [
                'nom' => 'BATIMENT TRAVAUX PUBLICS',
                'description' => 'Apprenez les métiers du bâtiment et des travaux publics, des secteurs qui recrutent constamment.',
            ],
            [
                'nom' => 'FINANCE COMPTA',
                'description' => 'Formez-vous aux métiers de la finance et de la comptabilité, indispensables dans toute entreprise.',
            ],
        ];

        foreach ($categories as $categorie) {
            Categorie::create($categorie);
        }
    }
} 