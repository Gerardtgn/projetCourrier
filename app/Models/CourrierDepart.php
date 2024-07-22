<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourrierDepart extends Model
{
    use HasFactory;
    protected $fillable = [
        'objet',
        'status',
        'destinataire',
        'date_depart',
        'fichier',

    ];
}
