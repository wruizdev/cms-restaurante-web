<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <title>Panel Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar py-4">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        @if(Auth::user()->rol == 0)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('usuarios.index') }}">Usuarios</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.estadisticas') }}">Estadísticas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('mesas.index') }}">Mesas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('platos.index') }}">Carta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('reservas.index') }}">Reservas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-link nav-link">Cerrar sesión</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-10 ms-sm-auto px-md-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>
    @yield('scripts')
</body>

</html>