<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Slider3;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Slider3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider3s = DB::table('admins')
        ->join('slider3s', 'admins.id', '=', 'slider3s.admin_id')
        ->select('*', 'admins.name as admin', 'slider3s.id as identifiant')
        ->get();
        return view('slider3.index', compact('slider3s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider3.add');
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
            $data = new Slider3();

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
    public function edit($slider3)
    {
        $slider3s = Slider3::find($slider3);
        return view('slider3.update',compact('slider3s'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slider3)
    {
        $data = $request->validate([
            'image'=>'required|file|max:1024'
        ]);

        try {
            $data = Slider3::find($slider3);

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
    public function destroy($slider3)
    {
        $slider3s = Slider3::find($slider3);
        try {
            $slider3s->delete();
            return redirect()->back()->with('success', 'Image supprimée avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
