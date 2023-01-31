<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = DB::table('entreprises')
            ->join('services', 'entreprises.id', '=', 'services.entreprise_id')
            ->select('*', 'entreprises.nom as entreprise', 'services.id as identifiant')
            ->get();

        return view('service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entreprises = Entreprise::all();
        return view('service.add', compact('entreprises'));
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
            'entreprise_id' => 'required|integer',
            'libelle' => 'required|string',
            'description' => 'required|string'
        ]);

        try {
            $data = new Service();
            $data->entreprise_id = $request->entreprise_id;
            $data->libelle = $request->libelle;
            $data->description = $request->description;

            if ($request->image1) {
                $filename = time() . rand(1, 50) . '.' . $request->image1->extension();
                $img = $request->file('image1')->storeAs('ServiceImage', $filename, 'public');
                $data->image1 = $img;
            }

            if ($request->image2) {
                $filename2 = time() . rand(1, 50) . '.' . $request->image2->extension();
                $img2 = $request->file('image2')->storeAs('ServiceImage', $filename2, 'public');
                $data->image2 = $img2;
            }

            if ($request->image3) {
                $filename3 = time() . rand(1, 50) . '.' . $request->image3->extension();
                $img3 = $request->file('image3')->storeAs('ServiceImage', $filename3, 'public');
                $data->image3 = $img3;
            }

            if ($request->image4) {
                $filename4 = time() . rand(1, 50) . '.' . $request->image4->extension();
                $img4 = $request->file('image4')->storeAs('ServiceImage', $filename4, 'public');
                $data->image4 = $img4;
            }

            $data->save();
            return redirect()->back()->with('success', 'Service Ajouté avec succès');
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
    public function edit($service)
    {
        $services = Service::find($service);
        $entreprises = Entreprise::all();
        return view('service.update', compact('entreprises', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $service)
    {
        $data = $request->validate([
            'entreprise_id' => 'required|integer',
            'libelle' => 'required|string',
            'description' => 'required|string'
        ]);

        try {
            $data = Service::find($service);
            $data->entreprise_id = $request->entreprise_id;
            $data->libelle = $request->libelle;
            $data->description = $request->description;

            if ($request->image1) {
                $filename = time() . rand(1, 50) . '.' . $request->image1->extension();
                $img = $request->file('image1')->storeAs('ServiceImage', $filename, 'public');
                $data->image1 = $img;
            }

            if ($request->image2) {
                $filename2 = time() . rand(1, 50) . '.' . $request->image2->extension();
                $img2 = $request->file('image2')->storeAs('ServiceImage', $filename2, 'public');
                $data->image2 = $img2;
            }

            if ($request->image3) {
                $filename3 = time() . rand(1, 50) . '.' . $request->image3->extension();
                $img3 = $request->file('image3')->storeAs('ServiceImage', $filename3, 'public');
                $data->image3 = $img3;
            }

            if ($request->image4) {
                $filename4 = time() . rand(1, 50) . '.' . $request->image4->extension();
                $img4 = $request->file('image4')->storeAs('ServiceImage', $filename4, 'public');
                $data->image4 = $img4;
            }

            $data->update();
            return redirect()->back()->with('success', 'Service modifié avec succès');
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
    public function destroy($service)
    {
        $services = Service::find($service);
        try {
            $services->delete();
            return redirect()->back()->with('success', 'Service supprimée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
