@extends('layouts.web')

@section('title', 'Blog')

@php
    $backgroundClass = 'header-fondo-carta';
    $headerTitle = 'Nuestro Blog Gastronómico';
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
<section id="blog" class="padding-contenedores seccion-cards d-flex align-items-center fondo-fijo">
    <div class="container">
        <h2 class="text-center mb-5 text-white">Últimos Artículos</h2>
        <div class="row g-4">
            @forelse ($posts as $post)
            <div class="col-md-4">
                <div class="card-carta" style="--bg-url: url('{{ asset('storage/' . $post->foto_post) }}')">
                    <div class="card-carta-overlay">
                        <h5 class="card-title mb-1">{{ $post->titulo }}</h5>
                        <p class="card-text small mb-2">{{ $post->resumen }}</p>
                        <a href="{{ route('posts.showPublic', $post->id) }}" class="btn btn-light btn-sm mt-2">Leer más</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="text-white text-center">Aún no hay artículos publicados.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-4 text-center">
            {{ $posts->links() }}
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    function toggleMenu() {
        document.getElementById("menu").classList.toggle("show-menu");
    }
</script>
@endsection
