<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MiniSpot extends Model
{
    use HasFactory;

    protected $fillable = ['admin_id', 'video', 'image', 'pays_id'];

    public function admin()
    {
        return $this->hasMany(Admin::class);
    }
}
