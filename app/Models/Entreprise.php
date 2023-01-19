<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'email',
        'adresse',
        'statut',
        'telephone1',
        'telephone2',
        'telephone3',
        'telephone4',
        'itineraire',
        'siteweb',
        'descriptionCourte',
        'descriptionLongue',
        'logo',
        'photo1',
        'photo2',
        'photo3',
        'photo4',
        'est_pharmacie',
        'pharmacie_de_garde',
        'honneur',
        'est_souscrit',
        'vue',
        'a_publireportage',
        'publireportage1',
        'publireportage2',
        'publireportage3',
        'publireportage4',
        'publireportage5',
        'publireportage6',
        'a_magazine',
        'magazineimage1',
        'magazineimage2',
        'magazineimage3'
    ];

    public function sousCategorie()
    {
        return $this->hasMany(SousCategories::class);
    }

    public function commentaire()
    {
        return $this->belongsTo(Commentaire::class);
    }

    public function galerie()
    {
        return $this->belongsTo(Gallerie_image::class);
    }

    public function horaire()
    {
        return $this->belongsTo(Horaire::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
