<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParametreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parametres = Parametre::all();
        return view('parametre.index', compact('parametres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($parametre)
    {
        $parametres = Parametre::find($parametre);
        return view('parametre.update',compact('parametres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $parametre)
    {
        // $data = $request->validate([
        //     'video'=>'required|string'
        // ]);

        try {
            $data = Parametre::find($parametre);

            
            $data->email = $request->email;
            $data->adresse = $request->adresse;
            $data->geolocalisation = $request->geolocalisation;
            $data->telephone1 = $request->telephone1;
            $data->telephone2 = $request->telephone2;
            $data->lienface = $request->lienface;
            $data->lientwitter = $request->lientwitter;
            $data->lieninsta = $request->lieninsta;
            $data->lienyoutube = $request->lienyoutube;
            
            if ($request->logo_header) {
                $filename = time() . rand(1, 50) . '.' . $request->logo_header->extension();
                $logo_header = $request->file('logo_header')->storeAs('MiniSpot', $filename, 'public');
                $data->logo_header = $logo_header;
            }

            if ($request->logo_footer) {
                $filename2 = time() . rand(1, 50) . '.' . $request->logo_footer->extension();
                $logo_footer = $request->file('logo_footer')->storeAs('MiniSpot', $filename2, 'public');
                $data->logo_footer = $logo_footer;
            }

            $data->update();
            return redirect()->back()->with('success', 'Paramètre mis à jour avec succès');
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
    public function destroy($id)
    {
        //
    }
}
