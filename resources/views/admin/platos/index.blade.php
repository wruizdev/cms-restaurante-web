@extends('layouts.app')

@section('content')
<h1>Lista de Platos</h1>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('platos.create') }}" class="btn btn-primary mb-3">Crear Plato</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Foto</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($platos as $plato)
        <tr>
            <td>{{ $plato->id }}</td>
            <td>{{ $plato->nombre }}</td>
            <td>
                @if($plato->foto)
                <img src="{{ asset('storage/' . $plato->foto) }}" alt="Foto de {{ $plato->nombre }}" width="60">
                @else
                <span class="text-muted">Sin imagen</span>
                @endif
            </td>
            <td>
                @if ($plato->categoria === 'Entrante')
                <span class="badge bg-success">Entrante</span>
                @elseif ($plato->categoria === 'Principal')
                <span class="badge bg-primary">Principal</span>
                @elseif ($plato->categoria === 'Postre')
                <span class="badge bg-warning text-dark">Postre</span>
                @elseif ($plato->categoria === 'Bebida')
                <span class="badge bg-info text-dark">Bebida</span>
                @else
                <span class="badge bg-secondary">Desconocido</span>
                @endif

            </td>
            <td>{{ $plato->precio}}</td>
            <td>{{ $plato->descripcion}}</td>
            <td>
                <a href="{{ route('platos.edit', $plato) }}" class="btn btn-sm btn-warning">Editar</a>

                <form action="{{ route('platos.destroy', $plato) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('¿Seguro que quieres eliminar este plato?')" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection