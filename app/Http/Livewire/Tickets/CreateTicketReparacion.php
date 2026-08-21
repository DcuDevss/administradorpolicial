<?php

namespace App\Http\Livewire\Tickets;

use App\Models\DependenciaRiogrande;
use App\Models\DependenciaTolhuin;
use App\Models\Generalinformatica;
use App\Models\TicketReparacion;
use App\Models\TicketReparacionHistorial;
use App\Models\Tipodispositivo;
use App\Models\Totaldependencia;
use App\Models\User;
use App\Notifications\TicketReparacionNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateTicketReparacion extends Component
{
    public $dependencia_tipo = 'ushuaia';
    public $dependencia_id = '';
    public $generalinformatica_id = '';
    public $fecha_ingreso;
    public $hora_ingreso;
    public $entregado_por;
    public $recibido_por;
    public $equipo;
    public $marca;
    public $modelo;
    public $numero_serie;
    public $problema_reportado;
    public $searchEquipo = '';

    protected $rules = [
        'dependencia_tipo' => 'required|string',
        'dependencia_id' => 'required|integer',
        'generalinformatica_id' => 'nullable|exists:generalinformaticas,id',
        'fecha_ingreso' => 'required|date',
        'hora_ingreso' => 'nullable',
        'entregado_por' => 'required|string|max:255',
        'recibido_por' => 'nullable|string|max:255',
        'equipo' => 'required|string|max:255',
        'marca' => 'nullable|string|max:255',
        'modelo' => 'nullable|string|max:255',
        'numero_serie' => 'nullable|string|max:255',
        'problema_reportado' => 'required|string',
    ];

    public function mount(): void
    {
        $now = Carbon::now('America/Argentina/Buenos_Aires');
        $this->fecha_ingreso = $now->format('Y-m-d');
        $this->hora_ingreso = $now->format('H:i');
        $this->recibido_por = auth()->user()->name ?? null;
    }

    public function updatedDependenciaTipo(): void
    {
        $this->dependencia_id = '';
        $this->generalinformatica_id = '';
    }

    public function updatedGeneralinformaticaId($value): void
    {
        if (!$value) {
            return;
        }

        $inventario = Generalinformatica::with('tipodispositivo')->find($value);

        if ($inventario) {
            $this->equipo = $inventario->tipodispositivo->nombre ?? 'Equipo informatico';
            $this->marca = $inventario->marca;
            $this->modelo = $inventario->modelo;
            $this->numero_serie = $inventario->codigo_qr;
        }
    }

    public function guardar(): void
    {
        $this->validate();

        DB::transaction(function () {
            $ticket = TicketReparacion::create([
                'numero_ticket' => $this->generarNumeroTicket(),
                'user_id' => auth()->id(),
                'generalinformatica_id' => $this->generalinformatica_id ?: null,
                'dependencia_tipo' => $this->dependencia_tipo,
                'dependencia_id' => $this->dependencia_id,
                'dependencia_nombre' => $this->dependenciaNombre(),
                'fecha_ingreso' => $this->fecha_ingreso,
                'hora_ingreso' => $this->hora_ingreso ?: null,
                'entregado_por' => $this->entregado_por,
                'recibido_por' => $this->recibido_por,
                'equipo' => $this->equipo,
                'marca' => $this->marca,
                'modelo' => $this->modelo,
                'numero_serie' => $this->numero_serie,
                'problema_reportado' => $this->problema_reportado,
                'estado' => 'nuevo',
            ]);

            TicketReparacionHistorial::create([
                'ticket_reparacion_id' => $ticket->id,
                'usuario_id' => auth()->id(),
                'accion' => 'creado',
                'descripcion' => 'Ticket creado.',
            ]);

            User::role(['Admin', 'tecnicoinformatico'])
                ->get()
                ->each(fn(User $user) => $user->notify(new TicketReparacionNotification($ticket)));
        });

        $this->reset([
            'dependencia_id',
            'generalinformatica_id',
            'entregado_por',
            'equipo',
            'marca',
            'modelo',
            'numero_serie',
            'problema_reportado',
            'searchEquipo',
        ]);

        $now = Carbon::now('America/Argentina/Buenos_Aires');
        $this->fecha_ingreso = $now->format('Y-m-d');
        $this->hora_ingreso = $now->format('H:i');

        $this->dispatchBrowserEvent('notificacion', [
            'type' => 'success',
            'message' => 'Ticket cargado y enviado a Informatica.',
        ]);
    }

    private function generarNumeroTicket(): string
    {
        $next = (TicketReparacion::max('id') ?? 0) + 1;

        return 'REP-' . now()->format('Ymd') . '-' . str_pad((string) $next, 5, '0', STR_PAD_LEFT);
    }

    private function dependenciaNombre(): ?string
    {
        return match ($this->dependencia_tipo) {
            'tolhuin' => DependenciaTolhuin::find($this->dependencia_id)?->nombre,
            'riogrande' => DependenciaRiogrande::find($this->dependencia_id)?->nombre,
            default => Totaldependencia::find($this->dependencia_id)?->nombre,
        };
    }

    public function render()
    {
        $dependencias = match ($this->dependencia_tipo) {
            'tolhuin' => DependenciaTolhuin::orderBy('nombre')->get(),
            'riogrande' => DependenciaRiogrande::orderBy('nombre')->get(),
            default => Totaldependencia::orderBy('nombre')->get(),
        };

        $equipos = Generalinformatica::query()
            ->with(['tipodispositivo', 'dependenciaushuaia'])
            ->when($this->searchEquipo, function ($query) {
                $query->where(function ($q) {
                    $q->where('marca', 'like', "%{$this->searchEquipo}%")
                        ->orWhere('modelo', 'like', "%{$this->searchEquipo}%")
                        ->orWhere('codigo_qr', 'like', "%{$this->searchEquipo}%")
                        ->orWhereHas('tipodispositivo', fn($tipo) => $tipo->where('nombre', 'like', "%{$this->searchEquipo}%"));
                });
            })
            ->latest()
            ->limit(80)
            ->get();

        $tiposDispositivo = Tipodispositivo::orderBy('nombre')->get();

        return view('livewire.tickets.create-ticket-reparacion', compact('dependencias', 'equipos', 'tiposDispositivo'));
    }
}
