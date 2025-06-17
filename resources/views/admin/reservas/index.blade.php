@extends('layouts.app')

@section('content')
<h1>Lista de Reservas</h1>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('reservas.create') }}" class="btn btn-primary mb-3">Crear Reserva</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Mesa</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Comensales</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Control Personal</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reservas as $reserva)
        <tr>
            <td>{{ $reserva->id }}</td>
            <td>{{ $reserva->mesa_id }}</td>
            <td>{{ $reserva->nombre }}</td>
            <td>{{ $reserva->telefono }}</td>
            <td>{{ $reserva->email }}</td>
            <td>{{ $reserva->comensales }}</td>
            <td>{{ $reserva->fecha }}</td>
            <td>{{ \Carbon\Carbon::parse($reserva->hora)->format('H:i') }}</td>
            <td>
                @if($reserva->visto)
                <form action="{{ route('reservas.visto', $reserva->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-warning">No Visto</button>
                </form>
                @else
                <span class="text-success">Visto</span>
                @endif
            </td>
            <td>
                <a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-sm btn-warning">Editar</a>

                <form action="{{ route('reservas.destroy', $reserva) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('¿Seguro que quieres eliminar esta reserva?')" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection