@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuario: {{ $usuario->nick }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nick" class="form-label">Nick</label>
            <input type="text" name="nick" class="form-control" id="nick" value="{{ old('nick', $usuario->nick) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $usuario->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="rol" class="form-label">Rol</label>
            <select name="rol" id="rol" class="form-select" required>
                <option value="1" {{ old('rol', $usuario->rol) == '1' ? 'selected' : '' }}>Admin</option>
                <option value="0" {{ old('rol', $usuario->rol) == '0' ? 'selected' : '' }}>Superadmin</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
