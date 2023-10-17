<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousCategories extends Model
{
    use HasFactory;

    use Sluggable;

    public function Sluggable():array
    {
        return[
            'slug' =>
            [
                'source' => 'libelle'
            ]
        ];
    }

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
