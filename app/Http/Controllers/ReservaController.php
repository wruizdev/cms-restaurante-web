<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Mesa;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //Mostrar todas las reservas
    public function index()
    {
        $reservas = Reserva::all();
        return view('admin.reservas.index', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     */

    //Mostrar formulario para crear reserva pasando mesas disponibles
    public function create()
    {
        $mesasDisponibles = Mesa::where('estado', 0)->get();
        return view('admin.reservas.create', compact('mesasDisponibles'));
    }

    /**
     * Store a newly created resource in storage.
     */

    //Guardar nueva reserva
    public function store(Request $request)
    {
        $request->validate([
            'mesa_id' => 'required|exists:mesas,id',
            'nombre' => 'required|string',
            'telefono' => 'required|string',
            'email' => 'required|email|max:255',
            'comensales' => 'required|integer|min:1|max:100',
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required|date_format:H:i',
            'visto' => 'nullable|boolean',
        ]);

        Reserva::create([
            'mesa_id' => $request->mesa_id,
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'comensales' => $request->comensales,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'visto' => $request->visto
        ]);

        // Marcar la mesa como ocupada en la tabla de mesas
        $mesa = Mesa::findOrFail($request->mesa_id);
        $mesa->estado = 1; // 1 = ocupada
        $mesa->save();

        return redirect()->route('reservas.index')->with('success', 'Reserva creada satisfactoriamente');
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

    //Eliminar reserva
    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('reservas.index')->with('success', 'Reserva eliminada con éxito');
    }

    public function visto($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->visto = 0;
        $reserva->save();

        return redirect()->back()->with('success', 'La reserva ha sido vista por el personal');
    }
}
