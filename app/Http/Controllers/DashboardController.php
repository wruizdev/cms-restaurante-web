<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesa;
use App\Models\Plato;
use App\Models\Reserva;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $totalReservas = Reserva::count();
        $totalMesas = Mesa::count();
        $totalPlatos = Plato::count();
        $totalPosts = Post::count();

        return view('dashboard', compact('totalReservas', 'totalMesas', 'totalPlatos', 'totalPosts'));
    }
}
