@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Mesa: {{ $mesa->numero }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mesas.update', $mesa) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="zona" class="form-label">Zona</label>
            <input type="text" name="zona" class="form-control" id="zona" value="{{ old('zona', $mesa->zona) }}" required>
        </div>

        <div class="mb-3">
            <label for="numero" class="form-label">Número Mesa</label>
            <input type="number" name="numero" class="form-control" id="numero" value="{{ old('numero', $mesa->numero) }}" required>
        </div>

        <div class="mb-3">
            <label for="capacidad" class="form-label">Capacidad</label>
            <input type="number" name="capacidad" class="form-control" id="capacidad" value="{{ old('capacidad', $mesa->capacidad) }}" required>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select" required>
                <option value="1" {{ old('estado', $mesa->estado) == '1' ? 'selected' : '' }}>Ocupado</option>
                <option value="0" {{ old('estado', $mesa->estado) == '0' ? 'selected' : '' }}>Libre</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('mesas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
