<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{
    use HasFactory;

    protected $fillable = ['service_id', 'service_image', 'description'];

    public function service()
    {
        return $this->hasMany(Service::class);
    }
}
