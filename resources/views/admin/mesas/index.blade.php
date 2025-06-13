@extends('layouts.app')

@section('content')
<h1>Lista de Mesas</h1>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('mesas.create') }}" class="btn btn-primary mb-3">Crear Mesa</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Zona</th>
            <th>Número Mesa</th>
            <th>Capacidad</th>
            <th>Estado</th>
            <th>Liberar Mesa</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mesas as $mesa)
        <tr>
            <td>{{ $mesa->id_mesa }}</td>
            <td>{{ $mesa->zona }}</td>
            <td>{{ $mesa->numero }}</td>
            <td>{{ $mesa->capacidad }}</td>
            <td>{{ $mesa->estado == 0 ? 'Libre' : 'Ocupado' }}</td>
            <td>
                <!--@if($mesa->estado): Si la mesa está ocupada (estado = 1), muestra el botón.

                    <form ...>: Formulario que envía una solicitud PATCH al backend.

                    action="{{ route('mesas.liberar', $mesa->id) }}": Genera la URL usando el ID de la mesa.

                    @csrf: Token de seguridad (obligatorio).

                    @method('PATCH'): Spoofing de método HTTP, porque los formularios HTML solo soportan GET y POST.

                    <button type="submit">Liberar</button>: Botón para liberar la mesa.

                    @else: Si la mesa no está ocupada, muestra un mensaje en lugar del botón.

                    <span class="text-success">Libre</span>: Texto que indica que la mesa está libre.-->
                @if($mesa->estado)
                <form action="{{ route('mesas.liberar', $mesa->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-warning">Liberar</button>
                </form>
                @else
                <span class="text-success">Libre</span>
                @endif
            </td>
            <td>
                <a href="{{ route('mesas.edit', $mesa) }}" class="btn btn-sm btn-warning">Editar</a>

                <form action="{{ route('mesas.destroy', $mesa) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('¿Seguro que quieres eliminar esta mesa?')" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection