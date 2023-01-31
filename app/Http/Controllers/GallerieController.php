<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Gallerie_image;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GallerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = DB::table('entreprises')
        ->join('gallerie_images', 'entreprises.id', '=', 'gallerie_images.entreprise_id')
        ->select('*', 'entreprises.nom as entreprise', 'gallerie_images.id as identifiant')
        ->get();
        return view('gallerie.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entreprises = Entreprise::all();
        return view('gallerie.add', compact('entreprises'));
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
            'entreprise_id' => 'required|integer'
        ]);

        try {
            $data = new Gallerie_image();
            $data->entreprise_id = $request->entreprise_id;
            
            if ($request->galerie_image) {
                $filename = time() . rand(1, 50) . '.' . $request->galerie_image->extension();
                $img = $request->file('galerie_image')->storeAs('GallerieImage', $filename, 'public');
                $data->galerie_image = $img;
            }

            $data->save();
            return redirect()->back()->with('success', 'Image Ajoutée avec succès');
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
    public function edit($gallerie)
    {
        $entreprises = Entreprise::all();
        $galleries = Gallerie_image::find($gallerie);
        return view('gallerie.update', compact('entreprises','galleries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $gallerie)
    {
        $data = $request->validate([
            'entreprise_id' => 'required|integer'
        ]);

        try {
            $data = Gallerie_image::find($gallerie);
            $data->entreprise_id = $request->entreprise_id;
            
            if ($request->galerie_image) {
                $filename = time() . rand(1, 50) . '.' . $request->galerie_image->extension();
                $img = $request->file('galerie_image')->storeAs('GallerieImage', $filename, 'public');
                $data->galerie_image = $img;
            }

            $data->update();
            return redirect()->back()->with('success', 'Image mise à jour avec succès');
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
    public function destroy($gallerie)
    {
        $galleries = Gallerie_image::find($gallerie);
        try {
            $galleries->delete();
            return redirect()->back()->with('success', 'Image supprimée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
