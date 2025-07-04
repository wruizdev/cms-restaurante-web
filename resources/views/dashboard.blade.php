@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Bienvenido al Dashboard</h1>
    <p class="mb-4">Usuario: {{ Auth::user()->nick }}</p>

    <div class="row">
        <!-- Reservas -->
        <div class="col-md-3 mb-3">
            <div class="card text-white fondo-cards-dashboard h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-calendar-check me-2"></i>Reservas
                    </h5>
                    <p class="card-text display-6">{{ $totalReservas }}</p>
                </div>
            </div>
        </div>

        <!-- Mesas -->
        <div class="col-md-3 mb-3">
            <div class="card text-white fondo-cards-dashboard h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-chair me-2"></i>Mesas
                    </h5>
                    <p class="card-text display-6">{{ $totalMesas }}</p>
                </div>
            </div>
        </div>

        <!-- Platos -->
        <div class="col-md-3 mb-3">
            <div class="card text-white fondo-cards-dashboard h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-utensils me-2"></i>Platos
                    </h5>
                    <p class="card-text display-6">{{ $totalPlatos }}</p>
                </div>
            </div>
        </div>

        <!-- Publicaciones -->
        <div class="col-md-3 mb-3">
            <div class="card text-white fondo-cards-dashboard h-100">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-bullhorn me-2"></i>Publicaciones
                    </h5>
                    <p class="card-text display-6">{{ $totalPosts }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

