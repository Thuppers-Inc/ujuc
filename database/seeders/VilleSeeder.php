<?php

namespace Database\Seeders;

use App\Models\Ville;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Liste des villes principales de Côte d'Ivoire
        $villes = [
            'Abidjan',
            'Bouaké',
            'Daloa',
            'Yamoussoukro',
            'San-Pédro',
            'Korhogo',
            'Gagnoa',
            'Man',
            'Divo',
            'Séguéla',
            'Abengourou',
            'Dabou',
            'Grand-Bassam',
            'Agboville',
            'Soubré',
            'Ferkessédougou',
            'Dimbokro',
            'Odienné',
            'Duékoué',
            'Boundiali',
            'Bingerville',
            'Adzopé',
            'Aboisso',
            'Bondoukou',
            'Bongouanou',
            'Toumodi',
            'Lakota',
            'Danané',
            'Issia',
            'Tanda',
            'Bouna',
            'Katiola',
            'Tiassalé',
            'Tengréla',
            'Guiglo',
            'Touba',
            'Sassandra',
            'Mankono',
            'Oumé',
            'Biankouma',
            'Tabou',
            'Vavoua',
            'Zuénoula',
            'Bouaflé',
            'Béoumi',
            'Sakassou',
            'M\'bahiakro',
            'Bocanda',
            'Sinfra',
            'Jacqueville',
        ];

        // Insertion des villes dans la base de données
        foreach ($villes as $ville) {
            Ville::create([
                'nom' => $ville,
                // pays_id est nullable, donc pas besoin de le préciser
            ]);
        }
    }
}
