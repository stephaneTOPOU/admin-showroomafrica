<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Pays;
use App\Models\SousCategories;
use App\Models\User;
use App\Models\Ville;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entreprises = DB::table('pays')
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'sous_categories.categorie_id', '=', 'categories.id')
            ->join('entreprises', 'entreprises.souscategorie_id', '=', 'sous_categories.id')
            ->select('*', 'categories.libelle as categorie', 'pays.libelle as pays', 'entreprises.id as identifiant', 'entreprises.nom as ent', 'sous_categories.libelle as subcat')
            ->where('entreprises.valide', 1)
            ->get();

        $fonctions = DB::table('admins')
            ->where('fonction', 'admin')
            ->get();

        return view('entreprise.index', compact('entreprises', 'fonctions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $souscategories = DB::table('pays')
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'sous_categories.categorie_id', '=', 'categories.id')
            ->select('*', 'pays.libelle as nom')
            ->get();

        $villes = Ville::all();

        $pays = Pays::all();

        $fonctions = DB::table('admins')
            ->where('fonction', 'admin')
            ->get();

        return view('entreprise.add', compact('souscategories', 'villes', 'pays', 'fonctions'));
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
            'souscategorie_id' => 'required|integer',
            'nom' => 'required|string',
            'adresse' => 'nullable|string',
            'telephone1' => 'nullable|string'
        ]);

        try {

            $data = new Entreprise();

            if ($request->valide) {
                $data->valide = $request->valide;
            } else {
                $data->valide = 0;
            }

            $data->souscategorie_id = $request->souscategorie_id;
            $data->nom = $request->nom;
            $data->email = $request->email;
            $data->adresse = $request->adresse;
            $data->statu = $request->statu;
            $data->telephone1 = $request->telephone1;
            $data->telephone2 = $request->telephone2;
            $data->itineraire = $request->itineraire;
            $data->siteweb = $request->siteweb;
            $data->geolocalisation = $request->geolocalisation;
            $data->descriptionCourte = $request->descriptionCourte;

            if ($request->premium) {
                $data->premium = $request->premium;
            } else {
                $data->premium = 0;
            }

            if ($request->basic) {
                $data->basic = $request->basic;
            } else {
                $data->basic = 0;
            }

            if ($request->partenaire) {
                $data->partenaire = $request->partenaire;
            } else {
                $data->partenaire = 0;
            }

            if ($request->honneur) {
                $data->honneur = $request->honneur;
            } else {
                $data->honneur = 0;
            }

            // if ($request->logo) {
            //     $filename = time() . rand(1, 50) . '.' . $request->logo->extension();
            //     $img = $request->file('logo')->storeAs('logo', $filename, 'public');
            //     $data->logo = $img;
            // }

            if ($request->hasFile('logo')) {

                //get filename with extension
                $filenamewithextension = $request->file('logo')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('logo')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp1')->put($filenametostore, fopen($request->file('logo'), 'r+'));

                //Upload name to database
                $data->logo = $filenametostore;
            }

            // if ($request->photo1) {
            //     $filename1 = time() . rand(1, 50) . '.' . $request->photo1->extension();
            //     $img1 = $request->file('photo1')->storeAs('Pharmacie', $filename1, 'public');
            //     $data->photo1 = $img1;
            // }

            if ($request->hasFile('photo1')) {

                //get filename with extension
                $filenamewithextension = $request->file('photo1')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('photo1')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp3')->put($filenametostore, fopen($request->file('photo1'), 'r+'));

                //Upload name to database
                $data->photo1 = $filenametostore;
            }

            // if ($request->photo2) {
            //     $filename2 = time() . rand(1, 50) . '.' . $request->photo2->extension();
            //     $img2 = $request->file('photo2')->storeAs('photoDeCouveture', $filename2, 'public');
            //     $data->photo2 = $img2;
            // }

            if ($request->hasFile('photo2')) {

                //get filename with extension
                $filenamewithextension = $request->file('photo2')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('photo2')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp4')->put($filenametostore, fopen($request->file('photo2'), 'r+'));

                //Upload name to database
                $data->photo2 = $filenametostore;
            }

            // if ($request->photo4) {
            //     $filename4 = time() . rand(1, 50) . '.' . $request->photo4->extension();
            //     $img4 = $request->file('photo4')->storeAs('autreImage', $filename4, 'public');
            //     $data->photo4 = $img4;
            // }

            if ($request->hasFile('photo4')) {

                //get filename with extension
                $filenamewithextension = $request->file('photo4')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('photo4')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp6')->put($filenametostore, fopen($request->file('photo4'), 'r+'));

                //Upload name to database
                $data->photo4 = $filenametostore;
            }

            if ($request->est_souscrit) {
                $data->est_souscrit = $request->est_souscrit;
            } else {
                $data->est_souscrit = 0;
            }

            if ($request->est_pharmacie) {
                $data->est_pharmacie = $request->est_pharmacie;
            } else {
                $data->est_pharmacie = 0;
            }

            if ($request->pharmacie_de_garde) {
                $data->pharmacie_de_garde = $request->pharmacie_de_garde;
            } else {
                $data->pharmacie_de_garde = 0;
            }

            if ($request->a_publireportage) {
                $data->a_publireportage = $request->a_publireportage;
            } else {
                $data->a_publireportage = 0;
            }

            if ($request->a_magazine) {
                $data->a_magazine = $request->a_magazine;
            } else {
                $data->a_magazine = 0;
            }


            // if ($request->publireportage1) {
            //     $filename5 = time() . rand(1, 50) . '.' . $request->publireportage1->extension();
            //     $img5 = $request->file('publireportage1')->storeAs('publireportage', $filename5, 'public');
            //     $data->publireportage1 = $img5;
            // }

            if ($request->hasFile('publireportage1')) {

                //get filename with extension
                $filenamewithextension = $request->file('publireportage1')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('publireportage1')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp7')->put($filenametostore, fopen($request->file('publireportage1'), 'r+'));

                //Upload name to database
                $data->publireportage1 = $filenametostore;
            }

            // if ($request->magazineimage1) {
            //     $filename9 = time() . rand(1, 50) . '.' . $request->magazineimage1->extension();
            //     $img9 = $request->file('magazineimage1')->storeAs('magazine', $filename9, 'public');
            //     $data->magazineimage1 = $img9;
            // }

            if ($request->hasFile('magazineimage1')) {

                //get filename with extension
                $filenamewithextension = $request->file('magazineimage1')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('magazineimage1')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp11')->put($filenametostore, fopen($request->file('magazineimage1'), 'r+'));

                //Upload name to database
                $data->magazineimage1 = $filenametostore;
            }

            if ($request->hasFile('video')) {

                //get filename with extension
                $filenamewithextension = $request->file('video')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('video')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp19')->put($filenametostore, fopen($request->file('video'), 'r+'));

                //Upload name to database
                $data->video = $filenametostore;
            }

            $data->magazineimage3 = $request->magazineimage3;
            $data->save();
            return redirect()->back()->with('success', 'Nouvelle Entreprise ajoutée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($entreprise)
    {
        $entreprises = Entreprise::find($entreprise);

        $souscategories = DB::table('pays')
            ->join('categories', 'pays.id', '=', 'categories.pays_id')
            ->join('sous_categories', 'sous_categories.categorie_id', '=', 'categories.id')
            ->select('*', 'pays.libelle as nom')
            ->get();

        $villes = Ville::all();

        $pays = Pays::all();

        $fonctions = DB::table('admins')
            ->where('fonction', 'admin')
            ->get();

        return view('entreprise.update', compact('souscategories', 'villes', 'pays', 'entreprises', 'fonctions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $entreprise)
    {
        $data = $request->validate([
            'souscategorie_id' => 'required|integer',
            'nom' => 'required|string',
            'adresse' => 'nullable|string',
            'telephone1' => 'nullable|string'
        ]);

        try {

            $data = Entreprise::find($entreprise);

            if ($request->valide) {
                $data->valide = $request->valide;
            } else {
                $data->valide = 0;
            }

            $data->souscategorie_id = $request->souscategorie_id;
            $data->nom = $request->nom;
            $data->email = $request->email;
            $data->adresse = $request->adresse;
            $data->statu = $request->statu;
            $data->telephone1 = $request->telephone1;
            $data->telephone2 = $request->telephone2;
            $data->itineraire = $request->itineraire;
            $data->siteweb = $request->siteweb;
            $data->geolocalisation = $request->geolocalisation;
            $data->descriptionCourte = $request->descriptionCourte;

            if ($request->premium) {
                $data->premium = $request->premium;
            } else {
                $data->premium = 0;
            }

            if ($request->basic) {
                $data->basic = $request->basic;
            } else {
                $data->basic = 0;
            }

            if ($request->partenaire) {
                $data->partenaire = $request->partenaire;
            } else {
                $data->partenaire = 0;
            }

            if ($request->honneur) {
                $data->honneur = $request->honneur;
            } else {
                $data->honneur = 0;
            }

            // if ($request->logo) {
            //     $filename = time() . rand(1, 50) . '.' . $request->logo->extension();
            //     $img = $request->file('logo')->storeAs('logo', $filename, 'public');
            //     $data->logo = $img;
            // }

            if ($request->hasFile('logo')) {

                //get filename with extension
                $filenamewithextension = $request->file('logo')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('logo')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp1')->put($filenametostore, fopen($request->file('logo'), 'r+'));

                //Upload name to database
                $data->logo = $filenametostore;
            }

            // if ($request->photo1) {
            //     $filename1 = time() . rand(1, 50) . '.' . $request->photo1->extension();
            //     $img1 = $request->file('photo1')->storeAs('Pharmacie', $filename1, 'public');
            //     $data->photo1 = $img1;
            // }

            if ($request->hasFile('photo1')) {

                //get filename with extension
                $filenamewithextension = $request->file('photo1')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('photo1')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp3')->put($filenametostore, fopen($request->file('photo1'), 'r+'));

                //Upload name to database
                $data->photo1 = $filenametostore;
            }

            // if ($request->photo2) {
            //     $filename2 = time() . rand(1, 50) . '.' . $request->photo2->extension();
            //     $img2 = $request->file('photo2')->storeAs('photoDeCouveture', $filename2, 'public');
            //     $data->photo2 = $img2;
            // }

            if ($request->hasFile('photo2')) {

                //get filename with extension
                $filenamewithextension = $request->file('photo2')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('photo2')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp4')->put($filenametostore, fopen($request->file('photo2'), 'r+'));

                //Upload name to database
                $data->photo2 = $filenametostore;
            }

            // if ($request->photo4) {
            //     $filename4 = time() . rand(1, 50) . '.' . $request->photo4->extension();
            //     $img4 = $request->file('photo4')->storeAs('autreImage', $filename4, 'public');
            //     $data->photo4 = $img4;
            // }

            if ($request->hasFile('photo4')) {

                //get filename with extension
                $filenamewithextension = $request->file('photo4')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('photo4')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp6')->put($filenametostore, fopen($request->file('photo4'), 'r+'));

                //Upload name to database
                $data->photo4 = $filenametostore;
            }

            if ($request->est_souscrit) {
                $data->est_souscrit = $request->est_souscrit;
            } else {
                $data->est_souscrit = 0;
            }

            if ($request->est_pharmacie) {
                $data->est_pharmacie = $request->est_pharmacie;
            } else {
                $data->est_pharmacie = 0;
            }

            if ($request->pharmacie_de_garde) {
                $data->pharmacie_de_garde = $request->pharmacie_de_garde;
            } else {
                $data->pharmacie_de_garde = 0;
            }

            if ($request->a_publireportage) {
                $data->a_publireportage = $request->a_publireportage;
            } else {
                $data->a_publireportage = 0;
            }

            if ($request->a_magazine) {
                $data->a_magazine = $request->a_magazine;
            } else {
                $data->a_magazine = 0;
            }


            // if ($request->publireportage1) {
            //     $filename5 = time() . rand(1, 50) . '.' . $request->publireportage1->extension();
            //     $img5 = $request->file('publireportage1')->storeAs('publireportage', $filename5, 'public');
            //     $data->publireportage1 = $img5;
            // }

            if ($request->hasFile('publireportage1')) {

                //get filename with extension
                $filenamewithextension = $request->file('publireportage1')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('publireportage1')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp7')->put($filenametostore, fopen($request->file('publireportage1'), 'r+'));

                //Upload name to database
                $data->publireportage1 = $filenametostore;
            }

            // if ($request->magazineimage1) {
            //     $filename9 = time() . rand(1, 50) . '.' . $request->magazineimage1->extension();
            //     $img9 = $request->file('magazineimage1')->storeAs('magazine', $filename9, 'public');
            //     $data->magazineimage1 = $img9;
            // }

            if ($request->hasFile('magazineimage1')) {

                //get filename with extension
                $filenamewithextension = $request->file('magazineimage1')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('magazineimage1')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp11')->put($filenametostore, fopen($request->file('magazineimage1'), 'r+'));

                //Upload name to database
                $data->magazineimage1 = $filenametostore;
            }

            if ($request->hasFile('video')) {

                //get filename with extension
                $filenamewithextension = $request->file('video')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('video')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

                //Upload File to external server
                Storage::disk('ftp19')->put($filenametostore, fopen($request->file('video'), 'r+'));

                //Upload name to database
                $data->video = $filenametostore;
            }

            $data->magazineimage3 = $request->magazineimage3;

            $data->update();
            return redirect()->back()->with('success', 'L\'entreprise mise à jour avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($entreprise)
    {
        $entreprises = Entreprise::find($entreprise);
        try {
            $entreprises->delete();
            return redirect()->back()->with('success', 'Entreprise supprimée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
