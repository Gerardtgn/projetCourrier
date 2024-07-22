<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service',
    ];
    public function courrier_arrivees():BelongsToMany{
        return $this->belongsToMany(CourrierArrivee::class, 'affectations', 'id_service', 'id_courrier_arrivee')->withPivot('instructions', 'date')->withTimestamps();
    }
    public function users(){
        return $this->hasMany(User::class, 'id_service');
    }
}
