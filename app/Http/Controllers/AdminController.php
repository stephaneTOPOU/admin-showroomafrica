<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Pays;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = DB::table('pays')
            ->join('admins', 'pays.id', '=', 'admins.pays_id')
            ->select('*', 'admins.id as identifiant')
            ->get();

        $fonctions = DB::table('admins')
            ->where('fonction', 'admin')
            ->get();
        return view('admin.index', compact('admins', 'fonctions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pays = Pays::all();

        $fonctions = DB::table('admins')
            ->where('fonction', 'admin')
            ->get();
        return view('admin.add', compact('pays', 'fonctions'));
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
            'name' => 'required|string',
            'prenoms' => 'required|string',
            'email' => 'required|email|string',
            'password' => 'required|string',
            'pays_id' => 'required|integer'
        ]);

        try {
            //$data['password'] = bcrypt($request->password);
            // Admin::create($data);
            $data = new Admin();
            $data->name = $request->name;
            $data->prenoms = $request->prenoms;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->pays_id = $request->pays_id;
            $data->save();
            return redirect()->back()->with('success', 'Admin Ajouté avec succès');
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
    public function edit(Admin $admin)
    {
        $pays = Pays::all();

        $fonctions = DB::table('admins')
            ->where('fonction', 'admin')
            ->get();

        return view('admin.update', compact('admin', 'pays', 'fonctions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $admin)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'prenoms' => 'required|string',
            'email' => 'required|email|string',
            'password' => 'string',
            'pays_id' => 'required|integer'
        ]);

        try {
            $d['password'] = bcrypt($data['password']);
            $data = Admin::find($admin);
            $data->name = $request->name;
            $data->prenoms = $request->prenoms;
            $data->email = $request->email;
            $data->password = $d['password'];
            $data->pays_id = $request->pays_id;
            $data->update();
            return redirect()->back()->with('success', 'Admin mise à jour avec succès');
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
    public function destroy(Admin $admin)
    {
        try {
            $admin->delete();
            return redirect()->back()->with('success', 'Admin supprimé avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
    }
}
