<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['entreprise_id','libelle', 'description','image1','image2','image3','image4','image5','image6','image7','image8','image9','image10'];

    public function entreprise()
    {
        return $this->hasMany(Entreprises::class);
    }

    public function serviceImage()
    {
        return $this->belongsTo(ServiceImage::class);
    }
}
