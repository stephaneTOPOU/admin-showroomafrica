<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider1 extends Model
{
    use HasFactory;

    protected $fillable = ['admin_id','image'];

    public function admin()
    {
        return $this->hasMany(Admin::class);
    }

}
