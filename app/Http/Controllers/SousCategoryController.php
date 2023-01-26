<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\SousCategories;
use Exception;
use Illuminate\Http\Request;

class SousCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sousCategories = SousCategories::all();
        return view('sub-categorie.index', compact('sousCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('sub-categorie.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'libelle'=>'required|string',
            'categorie_id'=>'required|integer',
        ]);

        try {
            SousCategories::create($data);
            return redirect()->back()->with('success','Sous - catégorie Ajouté avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($souscategorie)
    {
        $souscategories = SousCategories::find($souscategorie);
        $categories = Categories::all();
        return view('sub-categorie.update', compact('categories', 'souscategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $souscategorie)
    {
        $souscategories = SousCategories::find($souscategorie);
        $data = $request->validate([
            'libelle'=>'required|string',
            'categorie_id'=>'required|integer',
        ]);

        try {
            $souscategories->update($data);
            return redirect()->back()->with('success','Sous - catégorie mise à jour avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($souscategorie)
    {
        $souscategories = SousCategories::find($souscategorie);
        try {
            $souscategories->delete();
            return redirect()->back()->with('success','Sous - catégorie supprimée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
