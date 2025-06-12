<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //Mostrar todas las mesas
    public function index()
    {
        $mesas = Mesa::all();
        return view('admin.mesas.index', compact('mesas'));
    }

    /**
     * Show the form for creating a new resource.
     */

    //Mostrar formulario para registrar mesa
    public function create()
    {
        return view('admin.mesas.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    //Guardar nueva mesa
    public function store(Request $request)
    {
        $request->validate([
            'zona' => 'required',
            'estado' => 'required|in:0,1',
            'numero' => 'required|unique:mesas',
            'capacidad' => 'required'
        ]);

        Mesa::crete([
            'zona' => $request->zona,
            'estado' => $request->estado,
            'numero' => $request->numero,
            'capacidad' => $request->capacidad
        ]);

        return redirect()->route('mesas.index')->with('success', 'Mesa creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
