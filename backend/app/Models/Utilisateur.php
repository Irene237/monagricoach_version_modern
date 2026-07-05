<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $table = 'utilisateur';

    // Laravel active automatiquement les timestamps (created_at et updated_at) 
    // par défaut, donc on n'a plus besoin de "public $timestamps = false;"

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