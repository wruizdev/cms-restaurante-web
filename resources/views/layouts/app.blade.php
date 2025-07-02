<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <title>Panel Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar py-4">
                <div class="position-sticky text-center mb-4">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/logo-sal-y-salsa.svg') }}" alt="Logo Empresa" class="img-fluid" style="max-height: 60px;">
                    </a>
                </div>
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        @if(Auth::user()->rol == 0)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('usuarios.index') }}">
                                <i class="bi bi-people me-2"></i> Usuarios
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.estadisticas') }}">
                                <i class="bi bi-bar-chart-line me-2"></i> Estadísticas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('mesas.index') }}">
                                <i class="bi bi-table me-2"></i> Mesas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('platos.index') }}">
                                <i class="bi bi-book me-2"></i> Carta
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('reservas.index') }}">
                                <i class="bi bi-calendar-check me-2"></i> Reservas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('posts.index') }}">
                                <i class="bi bi-file-text me-2"></i> Posts
                            </a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-link nav-link">
                                    <i class="bi bi-box-arrow-right me-2"></i> Cerrar sesión
                                </button>
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