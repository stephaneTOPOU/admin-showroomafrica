<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallerie_image extends Model
{
    use HasFactory;

    protected $fillable = ['entreprise_id','galerie_image'];

    public function entreprise()
    {
        return $this->hasMany(Entreprises::class);
    }
}
