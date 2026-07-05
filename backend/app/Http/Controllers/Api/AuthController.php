<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Utilisateur; // Importation indispensable du modèle

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // 1. Validation des données
        $validated = $request->validate([
            'email' => 'required|email|unique:utilisateur,email',
            'mot_de_passe' => 'required|min:4',
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required', // J'ai ajouté required car c'est important pour vous
            'type_utilisateur' => 'required|in:agriculteur,conseiller_agricole',
        ]);

        // 2. Création de l'utilisateur
        // Laravel remplira automatiquement created_at et updated_at grâce aux timestamps
        $utilisateur = Utilisateur::create([
            'email' => $validated['email'],
            'mot_de_passe' => bcrypt($validated['mot_de_passe']),
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'telephone' => $validated['telephone'],
            'pays' => $request->pays ?? 'Cameroun',
            'date_inscription' => now(), // Gardé pour votre besoin métier spécifique
            'type_utilisateur' => $validated['type_utilisateur'],
        ]);

        // 3. Réponse JSON
        return response()->json([
            'message' => 'Inscription réussie', 
            'data' => $utilisateur
        ], 201);
    }
}
