<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = ['libelle'];

    public function sousCategorie()
    {
        return $this->belongsTo(SousCategories::class);
    }
}
