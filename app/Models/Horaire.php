<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horaire extends Model
{
    use HasFactory;

    protected $fillable = ['entreprise_id','jour','h_ouverture','h_fermerture'];

    public function entreprise()
    {
        return $this->hasMany(Entreprises::class);
    }
}
