<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\SousCategories;
use Illuminate\Http\Request;

class SousCategorieController extends Controller
{
    public function index()
    {
        $sousCategories = SousCategories::all();
        return view('sub-categorie.index', compact('sousCategories'));
    }

    public function addSubCat()
    {
        $categories = Categories::all();
        return view('sub-categorie.add', compact('categories'));
    }

    public function updateSubCat()
    {
        $categories = Categories::all();
        return view('sub-categorie.update', compact('categories'));
    }
}
