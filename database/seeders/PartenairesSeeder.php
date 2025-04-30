<?php

namespace Database\Seeders;

use App\Models\Partenaire;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PartenairesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partenaires = [
            [
                'nom' => 'Agence Emploi Jeunes',
                'slug' => 'aej',
                'description' => "L'Agence Emploi Jeunes (AEJ) est une structure d'accompagnement pour favoriser l'insertion professionnelle des jeunes.",
                'site_web' => 'https://www.agenceemploijeunes.ci',
                'ordre' => 1,
            ],
            [
                'nom' => 'Inaya Group',
                'slug' => 'inaya-group',
                'description' => 'Inaya Group est une entreprise spécialisée dans les solutions innovantes et les formations professionnelles.',
                'site_web' => 'https://www.inaya-group.com',
                'ordre' => 2,
            ],
            [
                'nom' => 'Thuppers Inc',
                'slug' => 'thuppers-inc',
                'description' => 'Thuppers Inc est une entreprise de développement technologique et d\'accompagnement dans les métiers du numérique.',
                'site_web' => 'https://www.thuppers.com',
                'ordre' => 3,
            ],
        ];

        foreach ($partenaires as $partenaire) {
            // Vérifier si le partenaire existe déjà (basé sur le slug)
            if (!Partenaire::where('slug', $partenaire['slug'])->exists()) {
                Partenaire::create($partenaire);
            }
        }

        $this->command->info('Les partenaires ont été créés avec succès !');
    }
} 