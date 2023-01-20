<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('categorie.index', compact('categories'));
    }

    public function addCategory()
    {
        return view('categorie.add');
    }

    public function updateCategory()
    {
        return view('categorie.update');
    }
}
