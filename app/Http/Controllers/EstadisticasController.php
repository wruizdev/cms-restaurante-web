<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EstadisticasController extends Controller
{


    public function index()
    {
        // 1. Reservas por mes
        $reservasPorMes = Reserva::select(
            DB::raw('MONTH(fecha) as mes'),
            DB::raw('COUNT(*) as total')
        )
            ->groupBy(DB::raw('MONTH(fecha)'))
            ->orderBy(DB::raw('MONTH(fecha)'))
            ->get();

        $labelsMeses = $reservasPorMes->pluck('mes')->map(fn($mes) => Carbon::create()->month($mes)->locale('es')->translatedFormat('F'));
        $dataMeses = $reservasPorMes->pluck('total');

        // 2. Reservas por día (últimos 7 días)
        $hoy = Carbon::today();
        $ultimaSemana = Reserva::whereBetween('fecha', [$hoy->copy()->subDays(6), $hoy])
            ->select(
                DB::raw('DATE(fecha) as dia'),
                DB::raw('COUNT(*) as total')
            )
            ->groupBy('dia')
            ->orderBy('dia')
            ->get();

        $labelsDias = $ultimaSemana->pluck('dia')->map(fn($d) => Carbon::parse($d)->format('d/m'));
        $dataDias = $ultimaSemana->pluck('total');

        // 3. Reservas por cantidad de comensales
        $comensales = Reserva::select('comensales', DB::raw('COUNT(*) as total'))
            ->groupBy('comensales')
            ->orderBy('comensales')
            ->get();

        $labelsComensales = $comensales->pluck('comensales');
        $dataComensales = $comensales->pluck('total');

        // 4. Reservas por hora
        $horas = Reserva::select('hora', DB::raw('COUNT(*) as total'))
            ->groupBy('hora')
            ->orderBy('hora')
            ->get();

        $labelsHoras = $horas->pluck('hora');
        $dataHoras = $horas->pluck('total');

        // 5. Top 5 mesas más reservadas
        $mesas = Reserva::select('mesa_id', DB::raw('COUNT(*) as total'))
            ->groupBy('mesa_id')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $labelsMesas = $mesas->pluck('mesa_id')->map(fn($id) => "Mesa $id");
        $dataMesas = $mesas->pluck('total');

        return view('admin.estadisticas.estadisticas', compact(
            'labelsMeses',
            'dataMeses',
            'labelsDias',
            'dataDias',
            'labelsComensales',
            'dataComensales',
            'labelsHoras',
            'dataHoras',
            'labelsMesas',
            'dataMesas'
        ));
    }
}
