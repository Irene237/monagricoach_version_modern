<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash; // Importation nécessaire pour Hash::check

class AuthController extends Controller
{
    // ... votre fonction register existante reste ici ...

    public function login(Request $request)
    {
        // 1. Validation
        $credentials = $request->validate([
            'email' => 'required|email',
            'mot_de_passe' => 'required',
        ]);

        // 2. Recherche de l'utilisateur
        $user = Utilisateur::where('email', $credentials['email'])->first();

        // 3. Vérification du mot de passe haché
        // Note : Hash::check est la méthode standard pour comparer avec bcrypt
        if (!$user || !Hash::check($credentials['mot_de_passe'], $user->mot_de_passe)) {
            return response()->json(['message' => 'Identifiants invalides'], 401);
        }

        // 4. Génération du token (nécessite Laravel Sanctum)
        $token = $user->createToken('auth_token')->plainTextToken;

        // 5. Réponse avec le rôle pour la redirection front-end
        return response()->json([
            'message' => 'Connexion réussie',
            'token' => $token,
            'role' => $user->type_utilisateur,
            'user' => [
                'nom' => $user->nom,
                'prenom' => $user->prenom
            ]
        ]);
    }
}