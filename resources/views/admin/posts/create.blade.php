@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Post</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" id="titulo" value="{{ old('titulo') }}" required>
        </div>

        <div class="mb-3">
            <label for="resumen" class="form-label">Resumen</label>
            <textarea name="resumen" id="resumen" rows="3" class="form-control" required>{{ old('resumen') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="cuerpo" class="form-label">Cuerpo</label>
            <textarea name="cuerpo" id="cuerpo" rows="10" class="form-control" required>{{ old('cuerpo') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="foto_post" class="form-label">Imagen</label>
            <input type="file" name="foto_post" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

{{-- CKEditor --}}
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('cuerpo');
</script>
@endsection
