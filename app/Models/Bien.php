<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;
    protected $table='biens';
    protected $fillable=[
        'titre',
        'surface',
        'prix',
        'description',
        'adresse',
        'code_postal',
        'chambre',
        'etage',
        'piece',
        'est_vendu',
        'ville',
        'image'
    ];

    public function images()
    {
        return $this->hasMany(Images::class);
    }
}
