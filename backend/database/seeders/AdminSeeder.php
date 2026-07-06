<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // <--- AJOUTEZ CETTE LIGNE
use App\Models\Utilisateur;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Utilisateur::create([
            'email' => 'admin@monagricoach.com',
            'mot_de_passe' => Hash::make('1234'), // Maintenant Laravel connaîtra la classe Hash
            'nom' => 'NomAdmin',
            'prenom' => 'PrenomAdmin',
            'telephone' => '000000000',
            'pays' => 'Cameroun',
            'date_inscription' => now(),
            'type_utilisateur' => 'administrateur',
        ]);
    }
}