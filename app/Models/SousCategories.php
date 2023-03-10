<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousCategories extends Model
{
    use HasFactory;

    protected $fillable = ['categorie_id','libelle'];

    public function Categories()
    {
        return $this->hasMany(Categories::class);
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
}
