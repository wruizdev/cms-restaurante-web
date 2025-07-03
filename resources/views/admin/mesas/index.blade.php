@extends('layouts.app')

@section('content')
<h1 class="mb-4">Lista de Mesas</h1>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('mesas.create') }}" class="btn btn-primary mb-3">Crear Mesa</a>

<div class="table-responsive shadow-sm rounded">
    <table class="table table-striped table-hover align-middle mb-0 table-custom">
        <thead class="table-dark">
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
                <td>
                    @if($mesa->estado == 0)
                        <span class="badge bg-success">Libre</span>
                    @else
                        <span class="badge bg-danger">Ocupado</span>
                    @endif
                </td>
                <td>
                    @if($mesa->estado)
                    <form action="{{ route('mesas.liberar', $mesa->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-sm btn-outline-warning">Liberar</button>
                    </form>
                    @else
                    <span class="text-success fw-semibold">Libre</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('mesas.edit', $mesa) }}" class="btn btn-sm btn-outline-warning me-1">Editar</a>

                    <form action="{{ route('mesas.destroy', $mesa) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('¿Seguro que quieres eliminar esta mesa?')" class="btn btn-sm btn-outline-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
