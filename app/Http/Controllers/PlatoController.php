<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use Illuminate\Http\Request;

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //Mostrar todos los platos
    public function index()
    {
        $platos = Plato::all();
        return view('admin.platos.index', compact('platos'));
    }

    /**
     * Show the form for creating a new resource.
     */

    //Mostrar formulario para registrar plato
    public function create()
    {
        return view('admin.platos.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    //Guardar nuevo plato
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'foto' => 'nullable|image|max:4096',
            'categoria' => 'required|in:Entrante,Principal,Postre,Bebida',
            'precio' => 'required|decimal:2',
            'descripcion' => 'required|string|max:255'
        ]);

        //Para guardar solo la ruta en la BBDD y la foto en el storage del proyecto
        $rutaFoto = null;

        if ($request->hasFile('foto')) {
            $rutaFoto = $request->file('foto')->store('platos', 'public');
            // Guarda en storage/app/public/platos y devuelve la ruta relativa (ej: platos/imagen.jpg)
        }

        Plato::create([
            'nombre' => $request->nombre,
            'foto' => $rutaFoto,
            'categoria' => $request->categoria,
            'precio' => $request->precio,
            'descripcio' => $request->descripcion
        ]);

        return redirect()->route('platos.index')->with('success','Plato registrado correctamente');
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

    //Mostrar formulario para editar plato
    public function edit(Plato $plato)
    {
        return view('admin.platos.index', compact('plato'));
    }

    /**
     * Update the specified resource in storage.
     */

    //Actualizar datos plato
    public function update(Request $request, Plato $plato)
    {
        $plato->update($request->only('nombre', 'foto', 'categoria', 'precio', 'descripcion'));
        return redirect()->route('platos.index')->with('success', 'Plato actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */

    //Eliminar plato
    public function destroy(Plato $plato)
    {
        $plato->delete();
        return redirect()->route('platos.index')->with('success', 'Plato eliminado');
    }
}
