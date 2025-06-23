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
<script>
    //Para mostrar menú hamburguesa
    function toggleMenu() {
        document.getElementById("menu").classList.toggle("show-menu");
    }
</script>
@endsection
@section('scripts')
@endsection