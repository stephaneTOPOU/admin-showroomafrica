<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider3 extends Model
{
    use HasFactory;

    protected $fillable = ['admin_id','image', 'pays_id'];

    public function admin()
    {
        return $this->hasMany(Admin::class);
    }
}
