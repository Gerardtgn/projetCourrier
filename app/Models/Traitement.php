<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traitement extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_affectation',
        'id_user',
        'id_user_origine',
        'date',
        'fichier',
        'commentaire'
    ];
}
