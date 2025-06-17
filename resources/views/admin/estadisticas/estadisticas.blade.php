@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Estadísticas de Reservas</h2>

    {{-- Contenedor oculto con los datos en JSON --}}
    @php
    $jsonEstadisticas = json_encode([
        "meses" => ["labels" => $labelsMeses, "data" => $dataMeses],
        "dias" => ["labels" => $labelsDias, "data" => $dataDias],
        "comensales" => ["labels" => $labelsComensales, "data" => $dataComensales],
        "horas" => ["labels" => $labelsHoras, "data" => $dataHoras],
        "mesas" => ["labels" => $labelsMesas, "data" => $dataMesas],
    ]);
@endphp

<div id="estadisticas-data" data-json="{!! htmlspecialchars($jsonEstadisticas, ENT_QUOTES, 'UTF-8') !!}"></div>

    <div class="row row-cols-1 row-cols-md-2 g-4">

        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Reservas por Mes</h5>
                    <canvas id="chartMeses"></canvas>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Reservas (últimos 7 días)</h5>
                    <canvas id="chartDias"></canvas>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Reservas por Comensales</h5>
                    <canvas id="chartComensales"></canvas>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Reservas por Hora</h5>
                    <canvas id="chartHoras"></canvas>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Top 5 Mesas Más Reservadas</h5>
                    <canvas id="chartMesas"></canvas>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const rawData = document.getElementById('estadisticas-data').dataset.json;
        const d = JSON.parse(rawData);

        function createChart(id, type, labels, data, label) {
            const ctx = document.getElementById(id).getContext('2d');
            new Chart(ctx, {
                type: type,
                data: {
                    labels: labels,
                    datasets: [{
                        label: label,
                        data: data,
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 159, 64, 0.6)'
                        ],
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }
                }
            });
        }

        createChart('chartMeses', 'bar', d.meses.labels, d.meses.data, 'Reservas por mes');
        createChart('chartDias', 'line', d.dias.labels, d.dias.data, 'Reservas por día');
        createChart('chartComensales', 'bar', d.comensales.labels, d.comensales.data, 'Por comensales');
        createChart('chartHoras', 'bar', d.horas.labels, d.horas.data, 'Por hora');
        createChart('chartMesas', 'doughnut', d.mesas.labels, d.mesas.data, 'Top mesas');
    });
</script>
@endsection
