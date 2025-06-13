@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Plato: {{ $plato->id }}</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {{-- Es importante al subir foto que el formulario tenga el encype sino no funciona --}}
    <form action="{{ route('platos.update', $plato) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre Plato</label>
            <input type="text" name="nombre" class="form-control" id="nombre" value="{{ old('nombre', $plato->nombre) }}" required>
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
            <!-- Otros campos (nombre, precio, etc.) -->

            {{-- Mostrar la foto actual --}}
            @if ($plato->foto)
            <div class="mb-2">
                <label for="fotoActual" class="form-label">Foto Actual: </label>
                <img src="{{ asset('storage/' . $plato->foto) }}" alt="Foto del plato" width="60">
            </div>
            @endif

            {{-- Campo para subir nueva foto --}}
            <div class="mb-4">
                <label for="foto">Cambiar foto:</label>
                <input type="file" name="foto" id="foto" accept="image/*">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('platos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection