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

    // Salud tecnológica global
    public int $saludTecnologicaScore = 0;   // 0–100
    public string $saludTecnologicaNivel = 'Desconocida'; // Alta / Media / Baja

    // Incidentes recientes
    public $incidentesCriticos = [];

    // Filtros
    public ?string $ciudad = null;   // 'ushuaia', 'riogrande', 'tolhuin' o null
    public int $periodoDias = 30;    // 7, 30, 90...

    public function updatedCiudad(): void
    {
        // TODO: aplicar filtro por ciudad cuando definas cómo mapearla a dependencias.
        $this->calcularMetricas();
    }

    public function updatedPeriodoDias(): void
    {
        $this->calcularMetricas();
    }


    public function mount(): void
    {
        // valor por defecto
        $this->periodoDias = 30;
        $this->calcularMetricas();
    }

    protected function calcularMetricas(): void
    {
        // Ventana de tiempo según el período seleccionado
        $desde = now()->subDays($this->periodoDias);
        $hoy = now()->toDateString();

        // 1) Base query para comunicaciones (la filtramos por ciudad)
        $trabajosComuQuery = TrabajosGenerale::where('fecha_trabajo', '>=', $desde);

        if ($this->ciudad === 'ushuaia') {
            $trabajosComuQuery->whereNotNull('dependencia_ushuaia_id');
        } elseif ($this->ciudad === 'riogrande') {
            $trabajosComuQuery->whereNotNull('dependencia_riogrande_id');
        } elseif ($this->ciudad === 'tolhuin') {
            $trabajosComuQuery->whereNotNull('dependencia_tolhuin_id');
        }

        // Total de trabajos de comunicaciones
        $this->totalTrabajosComunicaciones = $trabajosComuQuery->count();

        // Incidentes recientes (usamos la misma query base)
        $this->incidentesCriticos = (clone $trabajosComuQuery)
            ->orderByDesc('fecha_trabajo')
            ->take(3)
            ->get();


        // 1) Trabajos de informática en el período
        $this->totalTrabajosInformatica = TrabajosInformatico::where('fecha_trabajo', '>=', $desde)->count();

        // 2) Trabajos de comunicaciones en el período
        $this->totalTrabajosComunicaciones = TrabajosGenerale::where('fecha_trabajo', '>=', $desde)->count();

        // 3) Dependencias con “alertas” = dependencias que tuvieron trabajos en el período
        $dependenciasInfo = TrabajosInformatico::where('fecha_trabajo', '>=', $desde)
            ->whereNotNull('totaldependencia_id')
            ->distinct('totaldependencia_id')
            ->count('totaldependencia_id');

        // Para comunicaciones tenemos varias columnas de dependencia; sumamos todas las distintas
        $depUsh = TrabajosGenerale::where('fecha_trabajo', '>=', $desde)
            ->whereNotNull('dependencia_ushuaia_id')
            ->distinct('dependencia_ushuaia_id')
            ->count('dependencia_ushuaia_id');

        $depRg = TrabajosGenerale::where('fecha_trabajo', '>=', $desde)
            ->whereNotNull('dependencia_riogrande_id')
            ->distinct('dependencia_riogrande_id')
            ->count('dependencia_riogrande_id');

        $depTol = TrabajosGenerale::where('fecha_trabajo', '>=', $desde)
            ->whereNotNull('dependencia_tolhuin_id')
            ->distinct('dependencia_tolhuin_id')
            ->count('dependencia_tolhuin_id');

        $this->dependenciasConAlertas = $dependenciasInfo + $depUsh + $depRg + $depTol;

        // 4) Técnicos en servicio hoy (independiente del período)
        $this->tecnicosEnServicioHoy = Turno::whereDate('fecha', $hoy)
            ->where('reservado', true)
            ->distinct('user_id')
            ->count('user_id');

        // ==========================
        // SALUD TECNOLÓGICA GLOBAL
        // ==========================

        // 1) Porcentaje de equipos con service reciente (último año)
        $totalEquipos = Generalinformatica::count();

        $equiposConServiceReciente = Generalinformatica::whereNotNull('fecha_service')
            ->where('fecha_service', '>=', now()->subYear())
            ->count();

        $serviceScore = $totalEquipos > 0
            ? $equiposConServiceReciente / $totalEquipos     // 0–1
            : 1; // si no hay equipos, no penalizamos

        // 2) Carga de trabajos en el período (informática + comunicaciones)
        $trabajosInfoPeriodo = $this->totalTrabajosInformatica;
        $trabajosComuPeriodo = $this->totalTrabajosComunicaciones;

        $trabajosTotalesPeriodo = $trabajosInfoPeriodo + $trabajosComuPeriodo;

        // Normalizamos: suponemos que 100 trabajos/mes es “carga alta”
        $maxTrabajosEsperados = 100;

        $cargaRelativa = $maxTrabajosEsperados > 0
            ? min(1, $trabajosTotalesPeriodo / $maxTrabajosEsperados) // 0–1 (1 = mucha carga)
            : 0;

        // Queremos que más carga => peor salud, por eso invertimos
        $cargaScore = 1 - $cargaRelativa; // 1 = poca carga, 0 = sobrecargado

        // 3) Combinamos ambos factores
        // Peso 60% service, 40% carga
        $healthRaw = (0.6 * $serviceScore) + (0.4 * $cargaScore); // 0–1

        $this->saludTecnologicaScore = (int) round($healthRaw * 100);

        // 4) Nivel textual
        if ($this->saludTecnologicaScore >= 80) {
            $this->saludTecnologicaNivel = 'Alta';
        } elseif ($this->saludTecnologicaScore >= 50) {
            $this->saludTecnologicaNivel = 'Media';
        } else {
            $this->saludTecnologicaNivel = 'Baja';
        }

        // ==========================
        // INCIDENTES RECIENTES
        // ==========================

        // Por ahora respetamos el mismo período seleccionado
        $this->incidentesCriticos = TrabajosGenerale::where('fecha_trabajo', '>=', $desde)
            // Aquí más adelante podés filtrar por prioridad, tipo, etc.
            ->orderByDesc('fecha_trabajo')
            ->take(3)
            ->get();
    }


    public function render()
    {
        return view('livewire.centro-situacion-operativa');
    }
}
