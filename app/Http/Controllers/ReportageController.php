<?php

namespace App\Http\Controllers;

use App\Models\Reportage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Pays;

class ReportageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reportages = DB::table('pays')
            ->join('reportages', 'pays.id', '=', 'reportages.pays_id')
            ->join('admins', 'admins.id', '=', 'reportages.admin_id')
            ->select('*', 'admins.name as admin', 'reportages.id as identifiant', 'pays.libelle as pays')
            ->get();

        $fonctions = Auth::user();

        return view('reportage.index', compact('reportages', 'fonctions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pays = Pays::all();

        $fonctions = Auth::user();

        return view('reportage.add', compact('pays', 'fonctions'));
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
            'video' => 'required|string',
            'pays_id' => 'required|integer'
        ]);

        try {
            $data = new Reportage();

            $data->admin_id =  Auth::user()->id;
            $data->pays_id = $request->pays_id;
            $data->video = $request->video;
            $data->libelle = $request->libelle;

            $data->save();
            return redirect()->back()->with('success', 'Lien YouTube ajouté avec succès');
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
    public function edit($reportage)
    {
        $reportages = Reportage::find($reportage);
        $pays = Pays::all();

        $fonctions = Auth::user();

        return view('reportage.update', compact('reportages', 'pays', 'fonctions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $reportage)
    {
        $data = $request->validate([
            'video' => 'required|string',
            'pays_id' => 'required|integer'
        ]);

        try {
            $data = Reportage::find($reportage);

            $data->admin_id =  Auth::user()->id;
            $data->pays_id = $request->pays_id;
            $data->video = $request->video;
            $data->libelle = $request->libelle;

            $data->update();
            return redirect()->back()->with('success', 'Lien YouTube mis à jour avec succès');
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
