<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Slider2;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Slider2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider2s = DB::table('admins')
        ->join('slider2s', 'admins.id', '=', 'slider2s.admin_id')
        ->select('*', 'admins.name as admin', 'slider2s.id as identifiant')
        ->get();
        return view('slider2.index', compact('slider2s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider2.add');
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
            $data = new Slider2();

            $data->admin_id =  Auth::user()->id;
            
            // if ($request->image) {
            //     $filename = time() . rand(1, 50) . '.' . $request->image->extension();
            //     $img = $request->file('image')->storeAs('sliders', $filename, 'public');
            //     $data->image = $img;
            // }

            if ($request->hasFile('image') ) {

                //get filename with extension
                $filenamewithextension = $request->file('image')->getClientOriginalName();
        
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $request->file('image')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;

                //Upload File to external server
                Storage::disk('ftp16')->put($filenametostore, fopen($request->file('image'), 'r+'));

                //Upload name to database
                $data->image = $filenametostore;
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
    public function edit($slider2)
    {
        $slider2s = Slider2::find($slider2);
        return view('slider2.update', compact('slider2s'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slider2)
    {
        $data = $request->validate([
            'image'=>'required|file|max:1024'
        ]);

        try {
            $data = Slider2::find($slider2);

            $data->admin_id =  Auth::user()->id;
            
            // if ($request->image) {
            //     $filename = time() . rand(1, 50) . '.' . $request->image->extension();
            //     $img = $request->file('image')->storeAs('sliders', $filename, 'public');
            //     $data->image = $img;
            // }

            if ($request->hasFile('image') ) {

                //get filename with extension
                $filenamewithextension = $request->file('image')->getClientOriginalName();
        
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
        
                //get file extension
                $extension = $request->file('image')->getClientOriginalExtension();
        
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;

                //Upload File to external server
                Storage::disk('ftp16')->put($filenametostore, fopen($request->file('image'), 'r+'));

                //Upload name to database
                $data->image = $filenametostore;
            }

            $data->update();
            return redirect()->back()->with('success', 'Image mise ?? jour avec succ??s');
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
    public function destroy($slider2)
    {
        $slider2s = Slider2::find($slider2);
        try {
            $slider2s->delete();
            return redirect()->back()->with('success', 'Image supprim??e avec succ??s');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
