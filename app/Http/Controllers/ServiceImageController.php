<?php

namespace App\Http\Controllers;

use App\Models\ServiceImage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServiceImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = DB::table('entreprises')
            ->join('services', 'entreprises.id', '=', 'services.entreprise_id')
            ->join('service_images', 'services.id', '=', 'service_images.service_id')
            ->select('*', 'entreprises.nom as entreprise', 'service_images.id as identifiant')
            ->get();
        return view('service-image.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = DB::table('entreprises')
            ->join('services', 'entreprises.id', '=', 'services.entreprise_id')
            ->select('*', 'entreprises.nom as entreprise', 'services.id as identifiant')
            ->get();

        return view('service-image.add', compact('services'));
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
            'service_id' => 'required|integer',
            'description' => 'required|string'
        ]);

        try {
            $data = new ServiceImage();
            $data->service_id = $request->service_id;
            $data->description = $request->description;

            // if ($request->service_image) {
            //     $filename = time() . rand(1, 50) . '.' . $request->service_image->extension();
            //     $img = $request->file('service_image')->storeAs('ServiceImage', $filename, 'public');
            //     $data->service_image = $img;
            // }

            if ($request->hasFile('service_image') ) {

                //get filename with extension
                $filenamewithextension = $request->file('service_image')->getClientOriginalName();
        
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $request->file('service_image')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;

                //Upload File to external server
                Storage::disk('ftp14')->put($filenametostore, fopen($request->file('service_image'), 'r+'));

                //Upload name to database
                $data->service_image = $filenametostore;
            }

            $data->save();
            return redirect()->back()->with('success', 'Image Ajout??e avec succ??s');
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
    public function edit($image)
    {
        $images = ServiceImage::find($image);

        $services = DB::table('entreprises')
        ->join('services', 'entreprises.id', '=', 'services.entreprise_id')
        ->select('*', 'entreprises.nom as entreprise', 'services.id as identifiant')
        ->get();

        return view('service-image.update', compact('services','images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $image)
    {
        $data = $request->validate([
            'service_id' => 'required|integer',
            'description' => 'required|string'
        ]);

        try {
            $data = ServiceImage::find($image);
            $data->service_id = $request->service_id;
            $data->description = $request->description;

            if ($request->hasFile('service_image') ) {

                //get filename with extension
                $filenamewithextension = $request->file('service_image')->getClientOriginalName();
        
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $request->file('service_image')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;

                //Upload File to external server
                Storage::disk('ftp14')->put($filenametostore, fopen($request->file('service_image'), 'r+'));

                //Upload name to database
                $data->service_image = $filenametostore;
            }

            $data->update();
            return redirect()->back()->with('success', 'Image modifi??e avec succ??s');
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
    public function destroy($image)
    {
        $images = ServiceImage::find($image);
        try {
            $images->delete();
            return redirect()->back()->with('success', 'Image supprim??e avec succ??s');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
