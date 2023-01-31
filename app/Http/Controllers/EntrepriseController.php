<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Pays;
use App\Models\SousCategories;
use App\Models\User;
use App\Models\Ville;
use Exception;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entreprises = Entreprise::all();
        return view('entreprise.index', compact('entreprises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $souscategories = SousCategories::all();
        $villes = Ville::all();
        $pays = Pays::all();

        return view('entreprise.add', compact('souscategories', 'villes', 'pays'));
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
            'telephone1' => 'nullable|string',
            'logo' => 'nullable|file|max:1024'
        ]);

        try {

            $data = new Entreprise();
            $data->souscategorie_id = $request->souscategorie_id;
            $data->nom = $request->nom;
            $data->email = $request->email;
            $data->adresse = $request->adresse;
            $data->statu = $request->statu;
            $data->telephone1 = $request->telephone1;
            $data->telephone2 = $request->telephone2;
            $data->telephone3 = $request->telephone3;
            $data->telephone4 = $request->telephone4;
            $data->itineraire = $request->itineraire;
            $data->siteweb = $request->siteweb;
            $data->geolocalisation = $request->geolocalisation;
            $data->descriptionCourte = $request->descriptionCourte;
            $data->descriptionLonge = $request->descriptionLonge;

            if ($request->logo) {
                $filename = time() . rand(1, 50) . '.' . $request->logo->extension();
                $img = $request->file('logo')->storeAs('logo', $filename, 'public');
                $data->logo = $img;
            }

            if ($request->photo1) {
                $filename1 = time() . rand(1, 50) . '.' . $request->photo1->extension();
                $img1 = $request->file('photo1')->storeAs('Pharmacie', $filename1, 'public');
                $data->photo1 = $img1;
            }

            if ($request->photo2) {
                $filename2 = time() . rand(1, 50) . '.' . $request->photo2->extension();
                $img2 = $request->file('photo2')->storeAs('photoDeCouveture', $filename2, 'public');
                $data->photo2 = $img2;
            }

            if ($request->photo3) {
                $filename3 = time() . rand(1, 50) . '.' . $request->photo3->extension();
                $img3 = $request->file('photo3')->storeAs('photoHonneur', $filename3, 'public');
                $data->photo3 = $img3;
            }

            if ($request->photo4) {
                $filename4 = time() . rand(1, 50) . '.' . $request->photo4->extension();
                $img4 = $request->file('photo4')->storeAs('autreImage', $filename4, 'public');
                $data->photo4 = $img4;
            }

            if ($request->est_souscrit) {
                $data->est_souscrit = $request->est_souscrit;
            } else {
                $data->est_souscrit = 0;
            }

            if ($request->elus) {
                $data->elus = $request->elus;
            } else {
                $data->elus = 0;
            }

            if ($request->honneur) {
                $data->honneur = $request->honneur;
            } else {
                $data->honneur = 0;
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


            if ($request->publireportage1) {
                $filename5 = time() . rand(1, 50) . '.' . $request->publireportage1->extension();
                $img5 = $request->file('publireportage1')->storeAs('publireportage', $filename5, 'public');
                $data->publireportage1 = $img5;
            }

            if ($request->publireportage2) {
                $filename6 = time() . rand(1, 50) . '.' . $request->publireportage2->extension();
                $img6 = $request->file('publireportage2')->storeAs('publireportage', $filename6, 'public');
                $data->publireportage2 = $img6;
            }

            if ($request->publireportage3) {
                $filename7 = time() . rand(1, 50) . '.' . $request->publireportage3->extension();
                $img7 = $request->file('publireportage3')->storeAs('publireportage', $filename7, 'public');
                $data->publireportage3 = $img7;
            }

            if ($request->publireportage4) {
                $filename8 = time() . rand(1, 50) . '.' . $request->publireportage4->extension();
                $img8 = $request->file('publireportage4')->storeAs('publireportage', $filename8, 'public');
                $data->publireportage4 = $img8;
            }

            if ($request->a_magazine) {
                $data->a_magazine = $request->a_magazine;
            } else {
                $data->a_magazine = 0;
            }

            if ($request->magazineimage1) {
                $filename9 = time() . rand(1, 50) . '.' . $request->magazineimage1->extension();
                $img9 = $request->file('magazineimage1')->storeAs('magazine', $filename9, 'public');
                $data->magazineimage1 = $img9;
            }

            if ($request->magazineimage2) {
                $filename10 = time() . rand(1, 50) . '.' . $request->magazineimage2->extension();
                $img10 = $request->file('magazineimage2')->storeAs('magazine', $filename10, 'public');
                $data->magazineimage2 = $img10;
            }

            if ($request->magazineimage3) {
                $filename11 = time() . rand(1, 50) . '.' . $request->magazineimage3->extension();
                $img11 = $request->file('magazineimage3')->storeAs('magazine', $filename11, 'public');
                $data->magazineimage3 = $img11;
            }

            $data->ville = $request->ville;
            $data->pays = $request->pays;
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
        $souscategories = SousCategories::all();
        $villes = Ville::all();
        $pays = Pays::all();

        return view('entreprise.update', compact('souscategories', 'villes', 'pays', 'entreprises'));
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
            'telephone1' => 'nullable|string',
            'logo' => 'nullable|file|max:1024'
        ]);

        try {

            $data = Entreprise::find($entreprise);
            $data->souscategorie_id = $request->souscategorie_id;
            $data->nom = $request->nom;
            $data->email = $request->email;
            $data->adresse = $request->adresse;
            $data->statu = $request->statu;
            $data->telephone1 = $request->telephone1;
            $data->telephone2 = $request->telephone2;
            $data->telephone3 = $request->telephone3;
            $data->telephone4 = $request->telephone4;
            $data->itineraire = $request->itineraire;
            $data->siteweb = $request->siteweb;
            $data->geolocalisation = $request->geolocalisation;
            $data->descriptionCourte = $request->descriptionCourte;
            $data->descriptionLonge = $request->descriptionLonge;

            if ($request->logo) {
                $filename = time() . rand(1, 50) . '.' . $request->logo->extension();
                $img = $request->file('logo')->storeAs('logo', $filename, 'public');
                $data->logo = $img;
            }

            if ($request->photo1) {
                $filename1 = time() . rand(1, 50) . '.' . $request->photo1->extension();
                $img1 = $request->file('photo1')->storeAs('Pharmacie', $filename1, 'public');
                $data->photo1 = $img1;
            }

            if ($request->photo2) {
                $filename2 = time() . rand(1, 50) . '.' . $request->photo2->extension();
                $img2 = $request->file('photo2')->storeAs('photoDeCouveture', $filename2, 'public');
                $data->photo2 = $img2;
            }

            if ($request->photo3) {
                $filename3 = time() . rand(1, 50) . '.' . $request->photo3->extension();
                $img3 = $request->file('photo3')->storeAs('photoHonneur', $filename3, 'public');
                $data->photo3 = $img3;
            }

            if ($request->photo4) {
                $filename4 = time() . rand(1, 50) . '.' . $request->photo4->extension();
                $img4 = $request->file('photo4')->storeAs('autreImage', $filename4, 'public');
                $data->photo4 = $img4;
            }

            if ($request->est_souscrit) {
                $data->est_souscrit = $request->est_souscrit;
            }

            if ($request->elus) {
                $data->elus = $request->elus;
            }

            if ($request->honneur) {
                $data->honneur = $request->honneur;
            }

            if ($request->est_pharmacie) {
                $data->est_pharmacie = $request->est_pharmacie;
            }

            if ($request->pharmacie_de_garde) {
                $data->pharmacie_de_garde = $request->pharmacie_de_garde;
            }

            if ($request->a_publireportage) {
                $data->a_publireportage = $request->a_publireportage;
            }

            if ($request->publireportage1) {
                $filename5 = time() . rand(1, 50) . '.' . $request->publireportage1->extension();
                $img5 = $request->file('publireportage1')->storeAs('publireportage', $filename5, 'public');
                $data->publireportage1 = $img5;
            }

            if ($request->publireportage2) {
                $filename6 = time() . rand(1, 50) . '.' . $request->publireportage2->extension();
                $img6 = $request->file('publireportage2')->storeAs('publireportage', $filename6, 'public');
                $data->publireportage2 = $img6;
            }

            if ($request->publireportage3) {
                $filename7 = time() . rand(1, 50) . '.' . $request->publireportage3->extension();
                $img7 = $request->file('publireportage3')->storeAs('publireportage', $filename7, 'public');
                $data->publireportage3 = $img7;
            }

            if ($request->publireportage4) {
                $filename8 = time() . rand(1, 50) . '.' . $request->publireportage4->extension();
                $img8 = $request->file('publireportage4')->storeAs('publireportage', $filename8, 'public');
                $data->publireportage4 = $img8;
            }

            if ($request->a_magazine) {
                $data->a_magazine = $request->a_magazine;
            }

            if ($request->magazineimage1) {
                $filename9 = time() . rand(1, 50) . '.' . $request->magazineimage1->extension();
                $img9 = $request->file('magazineimage1')->storeAs('magazine', $filename9, 'public');
                $data->magazineimage1 = $img9;
            }

            if ($request->magazineimage2) {
                $filename10 = time() . rand(1, 50) . '.' . $request->magazineimage2->extension();
                $img10 = $request->file('magazineimage2')->storeAs('magazine', $filename10, 'public');
                $data->magazineimage2 = $img10;
            }

            if ($request->magazineimage3) {
                $filename11 = time() . rand(1, 50) . '.' . $request->magazineimage3->extension();
                $img11 = $request->file('magazineimage3')->storeAs('magazine', $filename11, 'public');
                $data->magazineimage3 = $img11;
            }

            $data->ville = $request->ville;
            $data->pays = $request->pays;

            $data->update();
            return redirect()->back()->with('success', 'Entreprise mise à jour avec succès');
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
