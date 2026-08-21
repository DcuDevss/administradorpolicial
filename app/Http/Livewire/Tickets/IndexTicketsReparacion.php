<?php

namespace App\Http\Livewire\Tickets;

use App\Models\TicketReparacion;
use App\Models\TicketReparacionHistorial;
use App\Models\User;
use App\Notifications\TicketReparacionNotification;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class IndexTicketsReparacion extends Component
{
    use WithPagination;

    public $search = '';
    public $estado = '';
    public $perPage = 10;

    public $ticketId;
    public $tecnico_id = '';
    public $estadoActual = 'nuevo';
    public $diagnostico;
    public $pieza_danada;
    public $trabajo_realizado;
    public $observaciones;
    public $fecha_entrega;
    public $hora_entrega;
    public $entregado_por_tecnico;
    public $recibido_por_dependencia;
    public $equipo;
    public $marca;
    public $modelo;
    public $numero_serie;
    public $problema_reportado;

    protected $queryString = [
        'search' => ['except' => ''],
        'estado' => ['except' => ''],
        'perPage' => ['except' => 10],
        'ticketId' => ['except' => null, 'as' => 'ticket'],
    ];

    protected $rules = [
        'tecnico_id' => 'nullable|exists:users,id',
        'estadoActual' => 'required|string',
        'diagnostico' => 'nullable|string',
        'pieza_danada' => 'nullable|string',
        'trabajo_realizado' => 'nullable|string',
        'observaciones' => 'nullable|string',
        'fecha_entrega' => 'nullable|date',
        'hora_entrega' => 'nullable',
        'entregado_por_tecnico' => 'nullable|string|max:255',
        'recibido_por_dependencia' => 'nullable|string|max:255',
        'equipo' => 'required|string|max:255',
        'marca' => 'nullable|string|max:255',
        'modelo' => 'nullable|string|max:255',
        'numero_serie' => 'nullable|string|max:255',
        'problema_reportado' => 'required|string',
    ];

    public function mount($ticket = null): void
    {
        $ticketId = $ticket ?: request()->query('ticket');

        if ($ticketId) {
            $this->cargarTicket((int) $ticketId, true);
        }
    }

    public function seleccionar(int $ticketId): void
    {
        $this->cargarTicket($ticketId, true);
    }

    private function cargarTicket(int $ticketId, bool $registrarVista = false): void
    {
        $ticket = TicketReparacion::findOrFail($ticketId);
        $user = auth()->user();
        $puedeVer = $user && ($ticket->user_id === $user->id
            || $user->hasRole('Admin')
            || $user->hasRole('tecnicoinformatico'));

        abort_unless($puedeVer, 403);

        if ($registrarVista) {
            TicketReparacionHistorial::create([
                'ticket_reparacion_id' => $ticket->id,
                'usuario_id' => auth()->id(),
                'accion' => 'visto',
                'descripcion' => 'Ticket consultado.',
            ]);
        }

        $this->ticketId = $ticket->id;
        $this->tecnico_id = $ticket->tecnico_id ?: '';
        $this->estadoActual = $ticket->estado;
        $this->diagnostico = $ticket->diagnostico;
        $this->pieza_danada = $ticket->pieza_danada;
        $this->trabajo_realizado = $ticket->trabajo_realizado;
        $this->observaciones = $ticket->observaciones;
        $this->fecha_entrega = optional($ticket->fecha_entrega)->format('Y-m-d');
        $this->hora_entrega = $ticket->hora_entrega;
        $this->entregado_por_tecnico = $ticket->entregado_por_tecnico;
        $this->recibido_por_dependencia = $ticket->recibido_por_dependencia;
        $this->equipo = $ticket->equipo;
        $this->marca = $ticket->marca;
        $this->modelo = $ticket->modelo;
        $this->numero_serie = $ticket->numero_serie;
        $this->problema_reportado = $ticket->problema_reportado;
    }

    public function guardarTecnico(): void
    {
        $this->validate();

        $ticket = TicketReparacion::findOrFail($this->ticketId);
        $ticket->update([
            'equipo' => $this->equipo,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'numero_serie' => $this->numero_serie,
            'problema_reportado' => $this->problema_reportado,
            'tecnico_id' => $this->tecnico_id ?: null,
            'estado' => $this->estadoActual,
            'diagnostico' => $this->diagnostico,
            'pieza_danada' => $this->pieza_danada,
            'trabajo_realizado' => $this->trabajo_realizado,
            'observaciones' => $this->observaciones,
            'fecha_entrega' => $this->fecha_entrega ?: null,
            'hora_entrega' => $this->hora_entrega ?: null,
            'entregado_por_tecnico' => $this->entregado_por_tecnico,
            'recibido_por_dependencia' => $this->recibido_por_dependencia,
        ]);

        TicketReparacionHistorial::create([
            'ticket_reparacion_id' => $ticket->id,
            'usuario_id' => auth()->id(),
            'accion' => 'actualizado',
            'descripcion' => 'Datos técnicos y/o estado actualizados.',
        ]);

        $ticket->solicitante?->notify(new TicketReparacionNotification($ticket));

        $this->dispatchBrowserEvent('notificacion', [
            'type' => 'success',
            'message' => 'Ticket actualizado correctamente.',
        ]);
    }

    public function asignarTecnico(): void
    {
        $this->validateOnly('tecnico_id');

        $ticket = TicketReparacion::findOrFail($this->ticketId);
        $tecnicoId = $this->tecnico_id;
        $ticket->update([
            'tecnico_id' => $tecnicoId ?: null,
            'estado' => $tecnicoId && $ticket->estado === 'nuevo' ? 'asignado' : $ticket->estado,
        ]);

        $this->tecnico_id = $tecnicoId ?: '';
        $this->estadoActual = $ticket->estado;

        TicketReparacionHistorial::create([
            'ticket_reparacion_id' => $ticket->id,
            'usuario_id' => auth()->id(),
            'accion' => 'asignado',
            'descripcion' => $tecnicoId
                ? 'Técnico asignado: ' . (User::find($tecnicoId)?->name ?? 'Usuario') . '.'
                : 'Asignación de técnico removida.',
        ]);

        $this->dispatchBrowserEvent('notificacion', [
            'type' => 'success',
            'message' => $tecnicoId ? 'Técnico asignado correctamente.' : 'Asignación removida.',
        ]);
    }

    public function eliminarTicket(): void
    {
        $ticket = TicketReparacion::findOrFail($this->ticketId);
        $user = auth()->user();
        $puedeEliminar = $user && ($ticket->user_id === $user->id
            || $user->hasRole('Admin')
            || $user->hasRole('tecnicoinformatico'));

        abort_unless($puedeEliminar, 403);

        $numeroTicket = $ticket->numero_ticket;
        $ticket->delete();
        $this->limpiarSeleccion();

        $this->dispatchBrowserEvent('notificacion', [
            'type' => 'success',
            'message' => "El ticket {$numeroTicket} fue eliminado.",
        ]);
    }

    public function limpiarSeleccion(): void
    {
        $this->reset([
            'ticketId',
            'tecnico_id',
            'diagnostico',
            'pieza_danada',
            'trabajo_realizado',
            'observaciones',
            'fecha_entrega',
            'hora_entrega',
            'entregado_por_tecnico',
            'recibido_por_dependencia',
            'equipo',
            'marca',
            'modelo',
            'numero_serie',
            'problema_reportado',
        ]);

        $this->estadoActual = 'nuevo';
    }

    public function render()
    {
        auth()->user()?->unreadNotifications()
            ->where('type', TicketReparacionNotification::class)
            ->update(['read_at' => Carbon::now()]);

        $user = auth()->user();
        $isTecnico = $user && ($user->hasRole('Admin') || $user->hasRole('tecnicoinformatico'));

        $tickets = TicketReparacion::query()
            ->with(['solicitante', 'tecnico', 'equipoInventariado.tipodispositivo'])
            ->when(!$isTecnico, fn($query) => $query->where('user_id', auth()->id()))
            ->when($this->estado, fn($query) => $query->where('estado', $this->estado))
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('numero_ticket', 'like', "%{$this->search}%")
                        ->orWhere('dependencia_nombre', 'like', "%{$this->search}%")
                        ->orWhere('equipo', 'like', "%{$this->search}%")
                        ->orWhere('marca', 'like', "%{$this->search}%")
                        ->orWhere('modelo', 'like', "%{$this->search}%")
                        ->orWhere('problema_reportado', 'like', "%{$this->search}%");
                });
            })
            ->latest()
            ->paginate($this->perPage);

        $tecnicos = User::role(['Admin', 'tecnicoinformatico'])->orderBy('name')->get();
        $ticketSeleccionado = $this->ticketId
            ? TicketReparacion::with(['solicitante', 'tecnico', 'historial.usuario'])->find($this->ticketId)
            : null;

        return view('livewire.tickets.index-tickets-reparacion', [
            'tickets' => $tickets,
            'tecnicos' => $tecnicos,
            'ticketSeleccionado' => $ticketSeleccionado,
            'estados' => TicketReparacion::ESTADOS,
            'isTecnico' => $isTecnico,
        ]);
    }
}
