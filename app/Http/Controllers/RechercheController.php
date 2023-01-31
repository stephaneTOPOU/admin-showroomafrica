<?php

namespace App\Http\Controllers;

use App\Models\SliderRecherche;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RechercheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = DB::table('admins')
        ->join('slider_recherches', 'admins.id', '=', 'slider_recherches.admin_id')
        ->select('*', 'admins.name as admin', 'slider_recherches.id as identifiant')
        ->get();
        return view('slider-recherche.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider-recherche.add');
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
            'image'=>'required|file|max:1024'
        ]);

        try {
            $data = new SliderRecherche();

            $data->admin_id =  Auth::user()->id;
            
            if ($request->image) {
                $filename = time() . rand(1, 50) . '.' . $request->image->extension();
                $img = $request->file('image')->storeAs('sliders', $filename, 'public');
                $data->image = $img;
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
    public function edit($slider)
    {
        $sliders = SliderRecherche::find($slider);
        return view('slider-recherche.update', compact('sliders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slider)
    {
        $data = $request->validate([
            'image'=>'required|file|max:1024'
        ]);

        try {
            $data = SliderRecherche::find($slider);

            $data->admin_id =  Auth::user()->id;
            
            if ($request->image) {
                $filename = time() . rand(1, 50) . '.' . $request->image->extension();
                $img = $request->file('image')->storeAs('sliders', $filename, 'public');
                $data->image = $img;
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
    public function destroy($slider)
    {
        $sliders = SliderRecherche::find($slider);
        try {
            $sliders->delete();
            return redirect()->back()->with('success', 'Image supprimée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
