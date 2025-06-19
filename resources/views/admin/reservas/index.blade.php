@extends('layouts.app')

@section('content')
<h1>Lista de Reservas</h1>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="mb-3">
    <span id="badge-nuevas-reservas" class="badge bg-danger" style="display:none;">
        0 nuevas reservas
    </span>
</div>

<a href="{{ route('reservas.create') }}" class="btn btn-primary mb-3">Crear Reserva</a>

<div id="contenedor-tabla">
    @include('admin.reservas._tabla')
</div>



@endsection
@section('scripts')
<script>
    function actualizarBadgeNuevasReservas() {
        fetch("{{ route('admin.reservas.nuevas') }}")
            .then(response => response.json())
            .then(data => {
                const badge = document.getElementById('badge-nuevas-reservas');
                if (data.nuevas > 0) {
                    badge.textContent = data.nuevas + ' nueva' + (data.nuevas > 1 ? 's' : '') + ' reserva' + (data.nuevas > 1 ? 's' : '');
                    badge.style.display = 'inline-block';

                } else {
                    badge.style.display = 'none';
                }
            });
    }

    function actualizarTablaReservas() {
        fetch("{{ route('admin.reservas.tabla') }}")
            .then(response => response.text())
            .then(html => {
                const contenedor = document.getElementById('contenedor-tabla');
                if (contenedor) contenedor.innerHTML = html;
            });
    }

    document.addEventListener('DOMContentLoaded', function() {
        actualizarBadgeNuevasReservas();
        actualizarTablaReservas();
        //Añado setInterval para actualizar el badge y la tabla cada 10 segundos
        setInterval(() => {
            actualizarBadgeNuevasReservas();
            actualizarTablaReservas();
        }, 10000);
    });


   
</script>
@endsection