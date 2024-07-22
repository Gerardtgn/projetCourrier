<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Affectation extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_service_origine',
        'id_service_arrivee',
        'id_courrier_arrivee',
        'instruction',
        'fichier',
        'date',
    ];



    public function services(){
        return $this->belongsTo(Service::class);
    }

    public function courrier_arrivees(){
        return $this->belongsTo(CourrierArrivee::class);
    }


    public function users():BelongsToMany{
        return $this->belongsToMany(User::class, 'traitements', 'id_affectation', 'id_user')->withPivot('date', 'commentaire')->withTimestamps();

    }
}
