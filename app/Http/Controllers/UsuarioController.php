<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     //Mostrar todos los usuarios
    public function index()
    {
        $usuarios = Usuario::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    
    //Mostrar formulario de creación de usuario
    public function create()
    {
        return view('admin.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    //Guardar nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'nick' => 'required|unique:usuarios',
            'email'=> 'required|email|unique:usuarios',
            'password' => 'required|min:6',
            'rol' => 'required|in:0,1'
        ]);

        Usuario::create([
            'nick' => $request->nick,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'rol' => $request->rol
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente');
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

    //Mostrar formulario de edición
    public function edit(Usuario $usuario)
    {
        return view('admin.usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */

    //Actualizar usuario
    public function update(Request $request, Usuario $usuario)
    {
        $usuario->update($request->only('nick', 'email', 'rol'));
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */

    //Eliminar usuario
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado');
    }
}
