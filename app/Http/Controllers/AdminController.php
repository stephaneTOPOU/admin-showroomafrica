<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        return view('admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add');
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
            'name'=>'required|string',
            'prenoms'=>'required|string',
            'email'=>'required|email|string',
            'password'=>'required|string'
        ]);

        try {
            $data['password'] = bcrypt($request->password);
            Admin::create($data);
            return redirect()->back()->with('success','Admin Ajouté avec succès');
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
        //dd($admin);
        return view('admin.update', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $data = $request->validate([
            'name'=>'required|string',
            'prenoms'=>'required|string',
            'email'=>'required|email|string',
            'password'=>'required|string'
        ]);

        try {
            if (Hash::check(request('password'), $admin->password)) {
                $data['password'] = bcrypt($request->new_password);
                $admin->update($data);
                return redirect()->back()->with('success','Admin mise à jour avec succès');
            } else {
                return redirect()->back()->with('success','Mot de pass ne correspondent pas!!!');
            }
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
            return redirect()->back()->with('success','Admin supprimé avec succès');
        } catch (Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
        
    }
}
