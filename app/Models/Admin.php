<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    public function minispot()
    {
        return $this->belongsTo(MiniSpot::class);
    }

    public function popup()
    {
        return $this->belongsTo(PopUp::class);
    }

    public function reportage()
    {
        return $this->belongsTo(Reportage::class);
    }

    public function slider1()
    {
        return $this->belongsTo(Slider1::class);
    }

    public function slider2()
    {
        return $this->belongsTo(Slider2::class);
    }

    public function slider3()
    {
        return $this->belongsTo(Slider3::class);
    }

    public function sliderlateral()
    {
        return $this->belongsTo(SliderLateral::class);
    }

    public function sliderlateralbas()
    {
        return $this->belongsTo(SliderLateralBas::class);
    }

    public function sliderrecherche()
    {
        return $this->belongsTo(SliderRecherche::class);
    }

    public function sliderrecherchelateral()
    {
        return $this->belongsTo(SliderRechercheLateral::class);
    }

    public function sliderrecherchelateralbas()
    {
        return $this->belongsTo(SliderRechercheLateralBas::class);
    }

    public function sliderCategorie()
    {
        return $this->belongsTo(SliderCategorie::class);
    }

    public function sliderEntreprise()
    {
        return $this->belongsTo(SliderEntreprise::class);
    }

}
