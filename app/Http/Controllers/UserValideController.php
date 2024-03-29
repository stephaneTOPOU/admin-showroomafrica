<?php

namespace App\Http\Controllers;

use App\Models\Pays;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserValideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('pays')
            ->join('users', 'pays.id', '=', 'users.pays_id')
            ->select('*', 'users.id as identifiant', 'pays.libelle as pays')
            ->where('users.valide', 1)
            ->get();

        $fonctions = DB::table('admins')
            ->where('fonction', 'admin')
            ->get();

        return view('users.index', compact('users', 'fonctions'));
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $pays = Pays::all();

        $users = User::find($user);

        $fonctions = DB::table('admins')
            ->where('fonction', 'admin')
            ->get();

        return view('users.update', compact('pays', 'users', 'fonctions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $data = $request->validate([
            'name' => 'required|string',
        ]);

        try {
            
            $data = User::find($user);
            if ($request->valide) {
                $data->valide = $request->valide;
            } else {
                $data->valide = 0;
            }
            $data->update();
            return redirect()->back()->with('success', 'Utilisateur validé avec succès');
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
    public function destroy(User $user)
    {
        //
    }
}
