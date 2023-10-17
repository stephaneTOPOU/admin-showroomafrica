<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
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

    protected $fillable = ['libelle', 'pays_id'];

    public function sousCategorie()
    {
        return $this->belongsTo(SousCategories::class);
    }
}
