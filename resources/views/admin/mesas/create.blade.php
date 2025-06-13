@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Mesa</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mesas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="zona" class="form-label">Zona</label>
            <input type="text" name="zona" class="form-control" id="zona" value="{{ old('zona') }}" required>
        </div>

        <div class="mb-3">
            <label for="numero" class="form-label">Número Mesa</label>
            <input type="number" name="numero" class="form-control" id="numero" value="{{ old('numero') }}" required>
        </div>

        <div class="mb-3">
            <label for="capacidad" class="form-label">Capacidad</label>
            <input type="number" name="capacidad" class="form-control" id="capacidad" required>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select" required>
                <option value="1" {{ old('estado') == '1' ? 'selected' : '' }}>Ocupado</option>
                <option value="0" {{ old('estado') == '0' ? 'selected' : '' }}>Libre</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('mesas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
