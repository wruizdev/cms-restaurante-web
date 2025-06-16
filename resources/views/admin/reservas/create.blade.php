@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Reserva</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('reservas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="mesa" class="form-label">Mesas Disponibles</label>
            <select name="mesa_id" id="mesa_id" class="form-select" required>
                <option value="">-- Selecciona una mesa --</option>
                @foreach ($mesasDisponibles as $mesa)
                <option value="{{ $mesa->id }}"
                    {{ old('mesa_id', $reserva->mesa_id ?? '') == $mesa->id ? 'selected' : '' }}>
                    Mesa {{ $mesa->numero }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre Comensal</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $reserva->nombre ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="text" name="telefono" class="form-control" id="telefono" value="{{ old('telefono', $reserva->telefono ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $reserva->email ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="comensales" class="form-label">Número de Comensales</label>
            <input type="number" name="comensales" class="form-control" id="comensales" value="{{ old('comensales', $reserva->comensales ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha de la reserva</label>
            <input type="date" name="fecha" class="form-control" id="fecha" value="{{ old('fecha', $reserva->fecha ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Hora de la reserva</label>
            <input type="time" name="hora" class="form-control" id="hora" value="{{ old('hora', $reserva->hora ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="visto" class="form-label">Confirmado</label>
            <select name="visto" id="visto" class="form-select">
                <option value="0" {{ old('visto', $reserva->visto ?? 0) == 0 ? 'selected' : '' }}>No</option>
                <option value="1" {{ old('visto', $reserva->visto ?? 0) == 1 ? 'selected' : '' }}>Sí</option>
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection