<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens; // <--- 1. Importez ceci

class Utilisateur extends Model
{
    use HasApiTokens; // <--- 2. Ajoutez ceci ici

    protected $table = 'utilisateur';

    protected $fillable = [
        'email', 
        'mot_de_passe', 
        'nom', 
        'prenom', 
        'telephone', 
        'pays', 
        'date_inscription', 
        'type_utilisateur'
    ];
}