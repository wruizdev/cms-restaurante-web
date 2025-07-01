@extends('layouts.app')

@section('content')
<h1>Lista de Posts</h1>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Crear Post</a>

<table class="table table-bordered">
    <thead>
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
                <img src="{{ asset('storage/' . $post->foto_post) }}" alt="Imagen de {{ $post->titulo }}" width="60">
                @else
                <span class="text-muted">Sin imagen</span>
                @endif
            </td>
            <td>
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">Editar</a>

                <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('¿Seguro que quieres eliminar este post?')" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $posts->links() }}
@endsection
