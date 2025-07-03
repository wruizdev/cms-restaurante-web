@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Lista de Usuarios</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('usuarios.create') }}" class="btn btn-primary mb-3">Crear Usuario</a>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-striped table-hover align-middle mb-0 table-custom">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nick</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id_usuario }}</td>
                        <td>{{ $usuario->nick }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                            @if($usuario->rol == 0)
                                <span class="badge bg-danger">Superadmin</span>
                            @else
                                <span class="badge bg-secondary">Admin</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-sm btn-outline-warning me-1">Editar</a>

                            <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('¿Seguro que quieres eliminar?')" class="btn btn-sm btn-outline-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
