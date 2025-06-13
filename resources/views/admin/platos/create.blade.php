@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Plato</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('platos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre Plato</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre') }}" required>
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <select name="categoria" id="categoria" class="form-select" required>
                <option value="">-- Selecciona categoría --</option>
                <option value="Entrante" {{ old('categoria', $plato->categoria ?? '') == 'Entrante' ? 'selected' : '' }}>Entrante</option>
                <option value="Principal" {{ old('categoria', $plato->categoria ?? '') == 'Principal' ? 'selected' : '' }}>Principal</option>
                <option value="Postre" {{ old('categoria', $plato->categoria ?? '') == 'Postre' ? 'selected' : '' }}>Postre</option>
                <option value="Bebida" {{ old('categoria', $plato->categoria ?? '') == 'Bebida' ? 'selected' : '' }}>Bebida</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" name="precio" step="0.01" min="0" value="{{ old('precio', $plato->precio ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" rows="4" class="form-control" maxlength="1000" required>{{ old('descripcion', $plato->descripcion ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('platos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection