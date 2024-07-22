<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CourrierArrivee extends Model
{
    use HasFactory;

    protected $fillable = [
        'objet',
        'status',
        'expediteur',
        'date_ajout',
        'date_recu',
        'fichier',
    ];
    public function services():BelongsToMany{
        return $this->belongsToMany(Service::class, 'affectations', 'id_courrier_arrivee', 'id_service')->withPivot('instructions', 'date')->withTimestamps();
    }
}
