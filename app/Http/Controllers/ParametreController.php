<?php

namespace App\Http\Controllers;

use App\Models\Parametre;
use Exception;
use Illuminate\Http\Request;
use App\Models\Pays;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ParametreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parametres = DB::table('pays')
            ->join('parametres', 'pays.id', '=', 'parametres.pays_id')
            ->select('*', 'parametres.id as identifiant')
            ->get();

        $fonctions = Auth::user();
        return view('parametre.index', compact('parametres', 'fonctions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pays = Pays::all();
        $parametres = Parametre::all();

        $fonctions = Auth::user();

        return view('parametre.add', compact('pays', 'parametres', 'fonctions'));
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
            'pays_id'=>'required|integer'
        ]);

        try {
            $data = new Parametre();

            
            $data->email = $request->email;
            $data->adresse = $request->adresse;
            $data->geolocalisation = $request->geolocalisation;
            $data->telephone1 = $request->telephone1;
            $data->telephone2 = $request->telephone2;
            $data->lienface = $request->lienface;
            $data->lientwitter = $request->lientwitter;
            $data->lieninsta = $request->lieninsta;
            $data->lienyoutube = $request->lienyoutube;
            $data->pays_id = $request->pays_id;
            
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

            $data->save();
            return redirect()->back()->with('success', 'Paramètre a été ajouté avec succès');
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
    public function edit($parametre)
    {
        $parametres = Parametre::find($parametre);
        $pays = Pays::all();

        $fonctions = Auth::user();

        return view('parametre.update',compact('parametres', 'pays', 'fonctions'));
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
        $data = $request->validate([
            'pays_id'=>'required|integer'
        ]);

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
            $data->pays_id = $request->pays_id;

            if ($request->hasFile('logo_header')) {

                //get filename with extension
                $filenamewithextension = $request->file('logo_header')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('logo_header')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp20')->put($filenametostore, fopen($request->file('logo_header'), 'r+'));

                //Upload name to database
                $data->logo_header = $filenametostore;
            }

            if ($request->hasFile('logo_footer')) {

                //get filename with extension
                $filenamewithextension = $request->file('logo_footer')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('logo_footer')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp20')->put($filenametostore, fopen($request->file('logo_footer'), 'r+'));

                //Upload name to database
                $data->logo_footer = $filenametostore;
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
