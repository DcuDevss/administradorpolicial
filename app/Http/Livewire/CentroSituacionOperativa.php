<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TrabajosInformatico;
use App\Models\TrabajosGenerale;
use App\Models\Turno;
use App\Models\Generalinformatica;

class CentroSituacionOperativa extends Component
{
    public int $totalTrabajosInformatica = 0;
    public int $totalTrabajosComunicaciones = 0;
    public int $dependenciasConAlertas = 0;
    public int $tecnicosEnServicioHoy = 0;

    public int $saludTecnologicaScore = 0;
    public string $saludTecnologicaNivel = 'Desconocida';

    public $incidentesCriticos = [];

    public ?string $ciudad = null;   // ushuaia | riogrande | tolhuin | null
    public int $periodoDias = 30;

    /* ======================================================
       LIFECYCLE
    ====================================================== */

    public function mount(): void
    {
        $this->periodoDias = 30;
        $this->calcularMetricas();
    }

    public function updatedCiudad(): void
    {
        $this->calcularMetricas();
    }

    public function updatedPeriodoDias(): void
    {
        $this->calcularMetricas();
    }

    /* ======================================================
       FILTRO REUTILIZABLE POR CIUDAD
    ====================================================== */

    protected function aplicarFiltroCiudad($query)
    {
        return match ($this->ciudad) {
            'ushuaia'   => $query->whereNotNull('dependencia_ushuaia_id'),
            'riogrande' => $query->whereNotNull('dependencia_riogrande_id'),
            'tolhuin'   => $query->whereNotNull('dependencia_tolhuin_id'),
            default     => $query,
        };
    }

    /* ======================================================
       CÁLCULO PRINCIPAL
    ====================================================== */

    protected function calcularMetricas(): void
    {
        $desde = now()->subDays($this->periodoDias);
        $hoy = now()->toDateString();

        /* ==========================
           COMUNICACIONES
        ========================== */

        $trabajosComuQuery = $this->aplicarFiltroCiudad(
            TrabajosGenerale::where('fecha_trabajo', '>=', $desde)
        );

        $this->totalTrabajosComunicaciones = $trabajosComuQuery->count();

        $this->incidentesCriticos = (clone $trabajosComuQuery)
            ->orderByDesc('fecha_trabajo')
            ->take(3)
            ->get();

        /* ==========================
           INFORMÁTICA
        ========================== */

        $this->totalTrabajosInformatica = TrabajosInformatico::where('fecha_trabajo', '>=', $desde)
            ->count();

        /* ==========================
           DEPENDENCIAS CON ALERTAS
        ========================== */

        $dependenciasInfo = TrabajosInformatico::where('fecha_trabajo', '>=', $desde)
            ->whereNotNull('totaldependencia_id')
            ->distinct('totaldependencia_id')
            ->count('totaldependencia_id');

        $dependenciasComu = 0;

        foreach (['dependencia_ushuaia_id', 'dependencia_riogrande_id', 'dependencia_tolhuin_id'] as $campo) {
            $dependenciasComu += TrabajosGenerale::where('fecha_trabajo', '>=', $desde)
                ->whereNotNull($campo)
                ->distinct($campo)
                ->count($campo);
        }

        $this->dependenciasConAlertas = $dependenciasInfo + $dependenciasComu;

        /* ==========================
           TÉCNICOS EN SERVICIO HOY
        ========================== */

        $this->tecnicosEnServicioHoy = Turno::whereDate('fecha', $hoy)
            ->where('reservado', true)
            ->distinct('user_id')
            ->count('user_id');

        /* ==========================
           SALUD TECNOLÓGICA GLOBAL
        ========================== */

        $totalEquipos = Generalinformatica::count();

        $equiposConServiceReciente = Generalinformatica::whereNotNull('fecha_service')
            ->where('fecha_service', '>=', now()->subYear())
            ->count();

        $serviceScore = $totalEquipos > 0
            ? $equiposConServiceReciente / $totalEquipos
            : 1;

        $trabajosTotalesPeriodo = $this->totalTrabajosInformatica + $this->totalTrabajosComunicaciones;

        $maxTrabajosEsperados = 100;

        $cargaRelativa = min(1, $trabajosTotalesPeriodo / $maxTrabajosEsperados);

        $cargaScore = 1 - $cargaRelativa;

        $healthRaw = (0.6 * $serviceScore) + (0.4 * $cargaScore);

        $this->saludTecnologicaScore = (int) round($healthRaw * 100);

        $this->saludTecnologicaNivel = match (true) {
            $this->saludTecnologicaScore >= 80 => 'Alta',
            $this->saludTecnologicaScore >= 50 => 'Media',
            default => 'Baja',
        };
    }

    /* ======================================================
       RENDER
    ====================================================== */

    public function render()
    {
        return view('livewire.centro-situacion-operativa');
    }
}
