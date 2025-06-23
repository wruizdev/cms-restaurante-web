@extends('layouts.web')

@section('title', 'Carta')

@php
    /*Pasamos de forma dinámica variables con la clase que vamos a utilizar (se debe crear en el css) para el fondo y el title al web.header*/
    $backgroundClass = 'header-fondo-carta';
    $headerTitle = 'Nuesta Carta como nunca la imaginaste';
    $botonReservas = 'btn-reservas-oculto';
    $botonCarta ='btn-carta-oculto';
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
{{-- ====== ENTRANTES ====== --}}
<section id="entrantes" class="padding-contenedores seccion-cards d-flex align-items-center fondo-fijo">
<div class="container">
        <h2 class="text-center mb-5 text-white">Entrantes</h2>
        <div class="row g-4">
            @foreach ($entrantes as $plato)
                <div class="col-md-4">
                <div class="card-carta" style="--bg-url: url('{{ asset('storage/' . $plato->foto) }}')">
                        <div class="card-carta-overlay">
                            <h5 class="card-title mb-1">{{ $plato->nombre }}</h5>
                            <p class="card-text small mb-2">{{ $plato->descripcion }}</p>
                            <span class="precio">{{ number_format($plato->precio, 2) }} €</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ====== PRINCIPALES ====== --}}
<section id="principales" class="padding-contenedores seccion-cards d-flex align-items-center fondo-platos-alternativo">
<div class="container">
        <h2 class="text-center mb-5 text-white">Principales</h2>
        <div class="row g-4">
            @foreach ($principales as $plato)
                <div class="col-md-4">
                <div class="card-carta" style="--bg-url: url('{{ asset('storage/' . $plato->foto) }}')">
                        <div class="card-carta-overlay">
                            <h5 class="card-title mb-1">{{ $plato->nombre }}</h5>
                            <p class="card-text small mb-2">{{ $plato->descripcion }}</p>
                            <span class="precio">{{ number_format($plato->precio, 2) }} €</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
@section('scripts')
<script>
    //Para mostrar menú hamburguesa
    function toggleMenu() {
        document.getElementById("menu").classList.toggle("show-menu");
    }
</script>
@endsection