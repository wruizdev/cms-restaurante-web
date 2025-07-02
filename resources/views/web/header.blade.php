<header class="header {{ $backgroundClass ?? 'default-header' }}">
<a href="{{ route('home') }}">
    <img src="{{ asset('images/Logo-Sal-y-Salsa-light.svg') }}" alt="Logo" class="logo">
</a>


    <button class="menu-toggle btn btn-outline-light" onclick="toggleMenu()">☰</button>

    <div class="header-content container">
        <h1 class="display-4">{{ $headerTitle ?? 'Bienvenidos a Nuestro Restaurante' }}</h1>
        <div class="mt-4">
            <a href="{{ url('/#reservas') }}" class="btn btn-outline-light btn-general me-3 {{ $botonReservas ?? '' }}">Reservas</a>
            <a href="{{ route('carta') }}" class="btn btn-outline-light btn-general {{ $botonCarta ?? '' }}">Ver Carta</a>
        </div>
    </div>
</header>
<div id="menu" class="menu-overlay">
    <button class="close-menu" onclick="toggleMenu()">✖</button>
    <a href="{{ route('home') }}" onclick="toggleMenu()">Inicio</a>
    <a href="{{ url('/#reservas') }}" onclick="toggleMenu()">Reservas</a>
    <a href="{{ route('carta') }}" onclick="toggleMenu()">Carta</a>
    <a href="{{ route('posts.indexPublic') }}" onclick="toggleMenu()">Blog</a>
    <a href="{{ route('contacto') }}" onclick="toggleMenu()">Contacto</a>
</div>
