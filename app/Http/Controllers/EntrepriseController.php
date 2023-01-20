<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Pays;
use App\Models\SousCategories;
use App\Models\Ville;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    public function index()
    {
        $entreprises = Entreprise::all();
        return view('entreprise.index', compact('entreprises'));
    }

    public function addEntreprise()
    {
        $souscategories = SousCategories::all();
        $villes = Ville::all();
        $pays = Pays::all();

        return view('entreprise.add', compact('souscategories','villes','pays'));
    }

    public function updateEntreprise()
    {
        $souscategories = SousCategories::all();
        $villes = Ville::all();
        $pays = Pays::all();

        return view('entreprise.update', compact('souscategories','villes','pays'));
    }
}
