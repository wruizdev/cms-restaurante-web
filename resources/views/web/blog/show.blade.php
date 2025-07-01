@extends('layouts.web')

@section('title', $post->titulo)

@php
    $backgroundClass = 'header-fondo-carta';
    $headerTitle = $post->titulo;
    $botonReservas = 'btn-reservas-oculto';
    $botonCarta = 'btn-carta-oculto';
@endphp

@section('header')
    @include('web.header', [
        'backgroundClass' => $backgroundClass,
        'headerTitle' => $headerTitle,
        'botonReservas' => $botonReservas,
        'botonCarta' => $botonCarta
    ])
@endsection

@section('content')
<section id="contenedor-post" class="padding-contenedores fondo-platos-alternativo">
<div class="post-container">
    <h1 class="post-title">{{ $post->titulo }}</h1>
    <p class="post-summary">{{ $post->resumen }}</p>

    @if ($post->foto_post)
        <img src="{{ asset('storage/' . $post->foto_post) }}" alt="Imagen de {{ $post->titulo }}" class="img-post-medium">
    @endif

    <div class="post-body">
        {!! $post->cuerpo !!}
    </div>

    <a href="{{ route('posts.indexPublic') }}" class="back-link">← Volver al blog</a>
</div>
</section>
@endsection
