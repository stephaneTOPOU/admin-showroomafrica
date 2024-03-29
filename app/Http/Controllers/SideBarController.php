<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SideBarController extends Controller
{
    public function __invoke()
    {
        $fonctions = DB::table('admins')
            ->where('fonction', 'admin')
            ->get();

        return view('sideBar.sidebar', compact('fonctions'));
    }
}
