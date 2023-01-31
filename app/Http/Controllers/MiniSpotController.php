<?php

namespace App\Http\Controllers;

use App\Models\MiniSpot;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MiniSpotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $minspots = DB::table('admins')
        ->join('mini_spots', 'admins.id', '=', 'mini_spots.admin_id')
        ->select('*', 'admins.name as admin', 'mini_spots.id as identifiant')
        ->get();
        return view('mini-spot.index', compact('minspots'));
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
    public function edit($minspot)
    {
        $minspots = MiniSpot::find($minspot);
        return view('mini-spot.update', compact('minspots'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $minspot)
    {
        $data = $request->validate([
            'video'=>'required|file'
        ]);

        try {
            $data = MiniSpot::find($minspot);

            $data->admin_id =  Auth::user()->id;
            
            if ($request->video) {
                $filename = time() . rand(1, 50) . '.' . $request->video->extension();
                $video = $request->file('video')->storeAs('MiniSpot', $filename, 'public');
                $data->video = $video;
            }

            $data->update();
            return redirect()->back()->with('success', 'Vidéo mise à jour avec succès');
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
