@extends('layouts.app')

@section('content')
<h1 class="mb-4">Lista de Posts</h1>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Crear Post</a>

<div class="table-responsive shadow-sm rounded">
    <table class="table table-striped table-hover align-middle mb-0 table-custom">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Resumen</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->titulo }}</td>
                <td>{{ $post->resumen }}</td>
                <td>
                    @if($post->foto_post)
                    <img src="{{ asset('storage/' . $post->foto_post) }}" alt="Imagen de {{ $post->titulo }}" width="60" class="rounded shadow-sm">
                    @else
                    <span class="text-muted">Sin imagen</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-warning me-1">Editar</a>

                    <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('¿Seguro que quieres eliminar este post?')" class="btn btn-sm btn-outline-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-3">
    {{ $posts->links() }}
</div>
@endsection
