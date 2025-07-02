@extends('layouts.web')

@section('title', 'Espacio')

@php
/*Pasamos de forma dinámica variables con la clase que vamos a utilizar (se debe crear en el css) para el fondo y el title al web.header*/
$backgroundClass = 'header-fondo-espacio';
$headerTitle = 'Un espacio diseñado para que disfrutes';
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
<section id="contenedor-espacio" class="padding-contenedores fondo-fijo">
    <div class="container text-center mb-5">
        <p class="lead">La calidez y la atención al detalle son dos de nuestros valores fundamentales, y eso se refleja en la decoración de nuestro restaurante. En nuestros diferentes espacios y nuestra terraza exterior disfrutarás de colores y texturas propios de los atardeceres mediterráneos, mezclados con la alegría latina… ¡para traer hasta Valladolid la luz del mar y el son caribeño!</p>
    </div>

    <!-- Gallery -->
<div class="row justify-content-center galeria-centrado">
  <div class="col-md-5 col-lg-4 mb-4">
    <img
      src="{{ asset('images/sal-y-salsa-cabecera-filosofia-1024x683.jpg') }}"
      class="w-100 shadow-1-strong rounded mb-4 galeria-efecto"
      alt="Logo Interior"
    />
    <img
      src="{{ asset('images/sal-y-salsa-espacio-interior-1.jpg') }}"
      class="w-100 shadow-1-strong rounded mb-4 galeria-efecto imagen-espacio"
      alt="Mesa Interior"
    />
  </div>

  <div class="col-md-5 col-lg-4 mb-4">
    <img
      src="{{ asset('images/sal-y-salsa-detalle-lampara.jpg') }}"
      class="w-100 shadow-1-strong rounded mb-4 galeria-efecto imagen-espacio"
      alt="Lampara"
    />
    <img
      src="{{ asset('images/sal-y-salsa-espacio-sofa.jpg') }}"
      class="w-100 shadow-1-strong rounded mb-4 galeria-efecto"
      alt="Sofa"
    />
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