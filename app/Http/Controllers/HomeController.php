<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesa;
use App\Models\Reserva;
use App\Models\Plato;

class HomeController extends Controller
{
    public function index()
    {
        $mesasDisponibles = Mesa::where('estado', 0)->get();
        return view('web.home', compact('mesasDisponibles'));
    }

    public function carta()
    {
        $entrantes = Plato::where('categoria', 'Entrante')->get();
        $principales = Plato::where('categoria', 'Principal')->get();
        return view('web.carta', compact('entrantes','principales'));
    }

    public function espacio()
    {
        return view('web.espacio');
    }
}
