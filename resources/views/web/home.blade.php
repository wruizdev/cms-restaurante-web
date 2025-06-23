@extends('layouts.web')

@section('title', 'Inicio')



@php
    /*Pasamos de forma dinámica variables con la clase que vamos a utilizar (se debe crear en el css) para el fondo y el title al web.header*/
    $backgroundClass = 'header-fondo-home';
    $headerTitle = 'Bienvenidos a Nuestro Restaurante';
@endphp

@section('header')
    @include('web.header', [
        'backgroundClass' => $backgroundClass,
        'headerTitle' => $headerTitle
    ])
@endsection

@section('content')

{{-- ====== QUIÉNES SOMOS ====== --}}
<section id="quienes-somos" class="padding-contenedores bg-light fondo-fijo">
    <div class="container text-center">
        <h2 class="mb-5">¿Quiénes Somos?</h2>
        <p class="lead">Somos un restaurante familiar con pasión por la cocina mediterránea. Llevamos más de 15 años ofreciendo calidad, tradición y un servicio cálido a nuestros clientes.</p>
    </div>
</section>

{{-- ====== RESERVAS ====== --}}
<section id="reservas" class="reserva-section d-flex align-items-center">
    <div class="container p-5 rounded shadow-lg">
        <h2 class="text-center text-white mb-5">Reserva tu Mesa</h2>
        @if(session('success'))
    <div class="alert alert-success text-center" id="success-message">
        {{ session('success') }}
    </div>
@endif


        <div class="form-reserva mx-auto p-4">
            {{-- Formulario de reservas --}}
            <form method="POST" action="{{ route('home') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="telefono" class="form-control" placeholder="Teléfono" required>
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required>
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="comensales" class="form-control" placeholder="Número de comensales" required>
                    </div>
                    <div class="col-md-6">
                        <input type="date" name="fecha" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <input type="time" name="hora" class="form-control" required>
                    </div>
                    <div class="col-md-12">
                        <select name="mesa_id" class="form-select" required>
                            <option value="">Selecciona una mesa disponible</option>
                            @foreach ($mesasDisponibles as $mesa)
                                <option value="{{ $mesa->id }}">Mesa {{ $mesa->numero }} ({{ $mesa->capacidad }} personas)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 text-center mt-3">
                        <button type="submit" class="btn btn-primary">Reservar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

{{-- ====== DESTACADOS ====== --}}
<section id="destacados" class=" padding-contenedores seccion-cards d-flex align-items-center fondo-fijo">
    <div class="container">
        <h2 class="text-center mb-5">Nuestros Destacados</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card card-overlay text-white efecto-flotante">
                    <div class="card-bg fondo-destacados1"></div>
                    <div class="card-body position-relative">
                        <h5 class="card-title">Plato Estrella</h5>
                        <p class="card-text">Una descripción breve del plato más popular.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-overlay text-white efecto-flotante">
                    <div class="card-bg fondo-destacados2"></div>
                    <div class="card-body position-relative">
                        <h5 class="card-title">Ambiente Único</h5>
                        <p class="card-text">Disfruta de una experiencia gastronómica inolvidable.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-overlay text-white efecto-flotante">
                    <div class="card-bg fondo-destacados3"></div>
                    <div class="card-body position-relative">
                        <h5 class="card-title">Postres Caseros</h5>
                        <p class="card-text">Endulza tu visita con nuestras especialidades.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ====== UBICACIÓN ====== --}}
<section id="ubicacion" class="padding-contenedores bg-light">
    <div class="container text-center">
        <h2 class="mb-4">¿Dónde Estamos?</h2>
        <p class="lead">Nos encontramos en el corazón de la ciudad. ¡Ven a visitarnos!</p>
        <div class="mt-4">
            <iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="300" style="border:0;" allowfullscreen loading="lazy"></iframe>
        </div>
    </div>
</section>

{{-- ====== GALERIA ====== --}}
<section id="galeria" class="padding-contenedores fondo-fijo">
<!-- Gallery -->
<div class="row galeria-centrado">
  <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
    <img
      src="{{ asset('images/sal-y-salsa-entrecot.jpg') }}"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Entrecot"
    />

    <img
      src="{{ asset('images/sal-y-salsa-ensalada.jpg') }}"
      class="w-100 shadow-1-strong rounded mb-4 imagen-vertical"
      alt="Ensalada"
    />
  </div>

  <div class="col-lg-4 mb-4 mb-lg-0">
    <img
      src="{{ asset('images/sal-y-salsa-el-pulpo.jpg') }}"
      class="w-100 shadow-1-strong rounded mb-4 imagen-vertical"
      alt="El Pulpo"
    />

    <img
      src="{{ asset('images/sal-y-salsa-con-mazorcas.jpg') }}"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Mazorcas"
    />
  </div>

  <div class="col-lg-4 mb-4 mb-lg-0">
    <img
      src="{{ asset('images/sal-y-salsa-lubina.jpg') }}"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Lubina"
    />

    <img
      src="{{ asset('images/sal-y-salsa-langostinos.jpg') }}"
      class="w-100 shadow-1-strong rounded mb-4 imagen-vertical"
      alt="Langostinos"
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
<script>
    //Para quitar el mensaje de confirmación de reseva hecha en 4 segundos
    setTimeout(() => {
            document.getElementById('success-message')?.remove();
        }, 4000);
</script>
@endsection