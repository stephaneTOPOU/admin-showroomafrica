<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('service.index', compact('services'));
    }

    public function addService()
    {
        $entreprises = Entreprise::all();
        return view('service.add', compact('entreprises'));
    }

    public function updateService()
    {
        $entreprises = Entreprise::all();
        return view('service.update', compact('entreprises'));
    }
}
