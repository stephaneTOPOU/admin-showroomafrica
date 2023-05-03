<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;
    public $fillable = [
        'titre', 'text1', 'image1', 'text2', 'image2', 'text3', 'image3', 'text4', 'image4', 'text5', 'image5', 'text6', 'image6'
    ];
}
