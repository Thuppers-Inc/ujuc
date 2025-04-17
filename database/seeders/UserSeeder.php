<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrateur',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'super_admin',
            'telephone' => '+225 07 00 00 00 00',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Gestionnaire',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'telephone' => '+225 07 00 00 00 01',
            'is_active' => true,
        ]);
    }
} 