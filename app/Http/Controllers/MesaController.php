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

        Mesa::create([
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

     //Mostrar formulario edición Mesa
    public function edit(Mesa $mesa)
    {
        return view('admin.mesas.edit', compact('mesa'));
    }

    /**
     * Update the specified resource in storage.
     */

     //Actualizar datos mesa
    public function update(Request $request, Mesa $mesa)
    {
        $mesa->update($request->only('zona', 'estado', 'numero', 'capacidad'));
        return redirect()->route('mesas.index')->with('success', 'Mesa actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */

    //Eliminar mesa
    public function destroy(Mesa $mesa)
    {
        $mesa->delete();
        return redirect()->route('mesas.index')->with('success', 'Mesa eliminada');
    }

    //Lógica para liberar mesa vinculada al botón que aparece en la tabla del index si la mesa está ocupada
    public function liberar($id)
    {
        $mesa = Mesa::findOrFail($id);
        $mesa->estado=0; //Libre
        $mesa->save();

        return redirect()->back()->with('success', 'La mesa ha sido liberada');
    }
}
