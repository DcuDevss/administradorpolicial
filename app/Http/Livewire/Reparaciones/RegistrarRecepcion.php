<?php

namespace App\Http\Livewire\Reparaciones;

use App\Models\Recepcion;
use App\Models\SolicitudReparacion;
use App\Models\TicketReparacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Throwable;
use Illuminate\Support\Str;

#[Layout('layouts.app')]
class RegistrarRecepcion extends Component
{
    public SolicitudReparacion $solicitud;

    public bool $mostrar = false;

    public ?TicketReparacion $ticket = null;

    public string $personaEntregaNombre = '';

    public string $estadoFisico = '';

    public string $accesorios = '';

    public string $observaciones = '';

    /**
     * ============================================================
     * MOUNT
     * ============================================================
     */
    public function mount(SolicitudReparacion $solicitud): void
    {
        $this->solicitud = $solicitud->load([
            'activo.dependencia',
            'activo.categoria',
            'usuario',
            'turno',
            'recepciones.ticket',
        ]);

        $this->ticket = $this->solicitud
            ->recepciones
            ->first()
            ?->ticket;

        Log::info('RegistrarRecepcion: componente montado', [
            'solicitud_id' => $this->solicitud->id,
            'estado' => $this->solicitud->estado,
            'activo_id' => $this->solicitud->activo_id,
            'turno_id' => $this->solicitud->turno?->id,
            'usuario_solicitante_id' => $this->solicitud->usuario_id,
            'tiene_recepcion' => $this->tieneRecepcion(),
            'recepcion_id' => $this->solicitud->recepciones->first()?->id,
            'ticket_id' => $this->solicitud->recepciones->first()?->ticket?->id,
        ]);
    }

    /**
     * ============================================================
     * ABRIR MODAL
     * ============================================================
     */
    public function abrir(): void
    {
        Log::info('RegistrarRecepcion: intento de abrir recepción', [
            'solicitud_id' => $this->solicitud->id,
            'estado' => $this->solicitud->estado,
            'tiene_recepcion' => $this->tieneRecepcion(),
            'usuario_id' => Auth::id(),
        ]);

        if ($this->tieneRecepcion()) {

            Log::warning('RegistrarRecepcion: recepción ya existente, no se abre formulario', [
                'solicitud_id' => $this->solicitud->id,
            ]);

            return;
        }

        if ($this->solicitud->estado !== 'turnada') {

            Log::warning('RegistrarRecepcion: estado no permitido para recepción', [
                'solicitud_id' => $this->solicitud->id,
                'estado_actual' => $this->solicitud->estado,
                'estado_esperado' => 'turnada',
            ]);

            return;
        }

        $this->resetValidation();

        $this->reset([
            'personaEntregaNombre',
            'estadoFisico',
            'accesorios',
            'observaciones',
        ]);

        $this->mostrar = true;

        Log::info('RegistrarRecepcion: formulario de recepción abierto', [
            'solicitud_id' => $this->solicitud->id,
            'usuario_id' => Auth::id(),
        ]);
    }

    /**
     * ============================================================
     * CERRAR MODAL
     * ============================================================
     */
    public function cerrar(): void
    {
        Log::info('RegistrarRecepcion: formulario cerrado', [
            'solicitud_id' => $this->solicitud->id,
            'usuario_id' => Auth::id(),
        ]);

        $this->mostrar = false;

        $this->resetValidation();
    }

    /**
     * ============================================================
     * VERIFICAR RECEPCIÓN
     * ============================================================
     */
    public function tieneRecepcion(): bool
    {
        return $this->solicitud
            ->recepciones()
            ->exists();
    }

    /**
     * ============================================================
     * REGISTRAR RECEPCIÓN
     * ============================================================
     */
    public function registrar(): void
    {
        Log::info('RegistrarRecepcion: INICIO registrar()', [
            'solicitud_id' => $this->solicitud->id,
            'usuario_id' => Auth::id(),
            'persona_entrega' => $this->personaEntregaNombre,
            'estado_fisico' => $this->estadoFisico,
            'accesorios' => $this->accesorios,
            'observaciones' => $this->observaciones,
        ]);

        /**
         * --------------------------------------------------------
         * 1. VALIDACIÓN
         * --------------------------------------------------------
         */
        Log::info('RegistrarRecepcion: iniciando validación', [
            'solicitud_id' => $this->solicitud->id,
        ]);

        $this->validate([
            'personaEntregaNombre' => [
                'required',
                'string',
                'max:150',
            ],

            'estadoFisico' => [
                'required',
                'string',
                'max:2000',
            ],

            'accesorios' => [
                'nullable',
                'string',
                'max:2000',
            ],

            'observaciones' => [
                'nullable',
                'string',
                'max:3000',
            ],
        ], [
            'personaEntregaNombre.required' =>
            'Debe indicar quién entrega el equipo.',

            'personaEntregaNombre.max' =>
            'El nombre no puede superar los 150 caracteres.',

            'estadoFisico.required' =>
            'Debe indicar el estado físico del equipo.',

            'estadoFisico.max' =>
            'El estado físico no puede superar los 2000 caracteres.',

            'accesorios.max' =>
            'Los accesorios no pueden superar los 2000 caracteres.',

            'observaciones.max' =>
            'Las observaciones no pueden superar los 3000 caracteres.',
        ]);

        Log::info('RegistrarRecepcion: validación correcta', [
            'solicitud_id' => $this->solicitud->id,
        ]);

        /**
         * --------------------------------------------------------
         * 2. ACTUALIZAR SOLICITUD
         * --------------------------------------------------------
         */
        Log::info('RegistrarRecepcion: actualizando modelo solicitud', [
            'solicitud_id' => $this->solicitud->id,
        ]);

        $this->solicitud->refresh();

        Log::info('RegistrarRecepcion: solicitud actualizada', [
            'solicitud_id' => $this->solicitud->id,
            'estado' => $this->solicitud->estado,
        ]);

        /**
         * --------------------------------------------------------
         * 3. VERIFICAR ESTADO
         * --------------------------------------------------------
         */
        if ($this->solicitud->estado !== 'turnada') {

            Log::warning('RegistrarRecepcion: solicitud no está en estado turnada', [
                'solicitud_id' => $this->solicitud->id,
                'estado_actual' => $this->solicitud->estado,
            ]);

            $this->addError(
                'general',
                'La solicitud ya no se encuentra disponible para recepción.'
            );

            return;
        }

        Log::info('RegistrarRecepcion: estado turnada confirmado', [
            'solicitud_id' => $this->solicitud->id,
        ]);

        /**
         * --------------------------------------------------------
         * 4. VERIFICAR RECEPCIÓN EXISTENTE
         * --------------------------------------------------------
         */
        Log::info('RegistrarRecepcion: verificando recepción existente', [
            'solicitud_id' => $this->solicitud->id,
        ]);

        if ($this->tieneRecepcion()) {

            Log::warning('RegistrarRecepcion: recepción duplicada detectada', [
                'solicitud_id' => $this->solicitud->id,
            ]);

            $this->addError(
                'general',
                'Esta solicitud ya posee una recepción registrada.'
            );

            return;
        }

        Log::info('RegistrarRecepcion: no existe recepción previa', [
            'solicitud_id' => $this->solicitud->id,
        ]);


        /**
         * --------------------------------------------------------
         * 5. TRANSACCIÓN
         * --------------------------------------------------------
         */
        try {

            Log::info('RegistrarRecepcion: iniciando transacción', [
                'solicitud_id' => $this->solicitud->id,
            ]);

            DB::transaction(function () {

                /**
                 * =================================================
                 * 5.1 CREAR RECEPCIÓN
                 * =================================================
                 */
                Log::info('RegistrarRecepcion: creando recepción', [
                    'solicitud_id' => $this->solicitud->id,
                    'usuario_id' => Auth::id(),
                ]);

                $recepcion = Recepcion::create([
                    'activo_id' => $this->solicitud->activo_id,
                    'solicitud_reparacion_id' => $this->solicitud->id,
                    'turno_reparacion_id' => $this->solicitud->turno_id,
                    'dependencia_id' => $this->solicitud->activo->dependencia_id,

                    'persona_entrega_nombre' => $this->personaEntregaNombre,
                    'estado_fisico' => $this->estadoFisico,
                    'accesorios' => $this->accesorios ?: null,
                    'observaciones' => $this->observaciones ?: null,

                    'recibido_por_id' => Auth::id(),
                    'fecha_recepcion' => now(),
                ]);

                Log::info('RegistrarRecepcion: recepción creada correctamente', [
                    'recepcion_id' => $recepcion->id,
                    'solicitud_id' => $this->solicitud->id,
                ]);

                /**
                 * =================================================
                 * 5.2 ACTUALIZAR ESTADO SOLICITUD
                 * =================================================
                 */
                Log::info('RegistrarRecepcion: actualizando estado de solicitud', [
                    'solicitud_id' => $this->solicitud->id,
                    'estado_anterior' => $this->solicitud->estado,
                    'estado_nuevo' => 'recepcionada',
                ]);

                $this->solicitud->update([
                    'estado' => 'recepcionada',
                ]);

                Log::info('RegistrarRecepcion: solicitud actualizada a recepcionada', [
                    'solicitud_id' => $this->solicitud->id,
                    'estado' => $this->solicitud->fresh()->estado,
                ]);
            });

            Log::info('RegistrarRecepcion: TRANSACCIÓN COMPLETADA', [
                'solicitud_id' => $this->solicitud->id,
            ]);
        } catch (Throwable $e) {

            Log::error('RegistrarRecepcion: ERROR EN TRANSACCIÓN', [
                'solicitud_id' => $this->solicitud->id,
                'usuario_id' => Auth::id(),
                'exception' => get_class($e),
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);

            $this->addError(
                'general',
                'No se pudo registrar la recepción. Revise el registro de errores.'
            );

            return;
        }
        /**
         * --------------------------------------------------------
         * 6. CERRAR FORMULARIO
         * --------------------------------------------------------
         */
        Log::info('RegistrarRecepcion: cerrando formulario', [
            'solicitud_id' => $this->solicitud->id,
        ]);

        $this->mostrar = false;

        $this->reset([
            'personaEntregaNombre',
            'estadoFisico',
            'accesorios',
            'observaciones',
        ]);

        /**
         * --------------------------------------------------------
         * 7. RECARGAR RELACIONES
         * --------------------------------------------------------
         */
        Log::info('RegistrarRecepcion: recargando relaciones', [
            'solicitud_id' => $this->solicitud->id,
        ]);

        $this->solicitud->refresh()->load([
            'activo.dependencia',
            'activo.categoria',
            'usuario',
            'turno',
            'recepciones.ticket',
        ]);

        /**
         * --------------------------------------------------------
         * 8. MENSAJE FINAL
         * --------------------------------------------------------
         */
        session()->flash(
            'success',
            'La recepción fue registrada correctamente. Puede generar el ticket correspondiente.'
        );
    }


    public function generarTicket(): void
    {
        Log::info('RegistrarRecepcion: INICIO generarTicket()', [
            'solicitud_id' => $this->solicitud->id,
            'usuario_id' => Auth::id(),
        ]);

        $this->solicitud->refresh();

        $recepcion = $this->solicitud
            ->recepciones()
            ->latest('id')
            ->first();

        /**
         * --------------------------------------------------------
         * 1. VERIFICAR RECEPCIÓN
         * --------------------------------------------------------
         */
        if (!$recepcion) {

            Log::warning(
                'RegistrarRecepcion: no existe recepción para generar ticket',
                [
                    'solicitud_id' => $this->solicitud->id,
                ]
            );

            $this->addError(
                'general',
                'Primero debe registrar la recepción del equipo.'
            );

            return;
        }

        /**
         * --------------------------------------------------------
         * 2. VERIFICAR TICKET EXISTENTE
         * --------------------------------------------------------
         */
        if ($recepcion->ticket()->exists()) {

            $ticketExistente = $recepcion->ticket()->first();

            Log::warning(
                'RegistrarRecepcion: la recepción ya posee ticket',
                [
                    'solicitud_id' => $this->solicitud->id,
                    'recepcion_id' => $recepcion->id,
                    'ticket_id' => $ticketExistente?->id,
                    'ticket_numero' => $ticketExistente?->numero,
                ]
            );

            $this->addError(
                'general',
                'Esta recepción ya posee un ticket generado.'
            );

            return;
        }

        /**
         * --------------------------------------------------------
         * 3. CREAR TICKET
         * --------------------------------------------------------
         */
        try {

            DB::transaction(function () use ($recepcion) {

                Log::info(
                    'RegistrarRecepcion: creando ticket',
                    [
                        'solicitud_id' => $this->solicitud->id,
                        'recepcion_id' => $recepcion->id,
                        'activo_id' => $this->solicitud->activo_id,
                    ]
                );

                /*
             * Creamos primero el ticket.
             *
             * El ID autoincremental permite construir
             * posteriormente el número operativo.
             */
                $ticket = TicketReparacion::create([
                    'solicitud_reparacion_id' => $this->solicitud->id,
                    'activo_id' => $this->solicitud->activo_id,
                    'recepcion_id' => $recepcion->id,
                    'codigo_verificacion' => Str::uuid()->toString(),
                    'estado' => 'abierto',
                    'emitido_at' => now(),
                ]);

                Log::info(
                    'RegistrarRecepcion: ticket creado',
                    [
                        'ticket_id' => $ticket->id,
                    ]
                );

                /**
                 * ----------------------------------------------------
                 * GENERAR NÚMERO DEL TICKET
                 * ----------------------------------------------------
                 */

                $numeroTicket =
                    'REP-' .
                    now()->format('Y') .
                    '-' .
                    str_pad(
                        $ticket->id,
                        6,
                        '0',
                        STR_PAD_LEFT
                    );

                $ticket->update([
                    'numero' => $numeroTicket,
                ]);

                Log::info(
                    'RegistrarRecepcion: número de ticket generado',
                    [
                        'ticket_id' => $ticket->id,
                        'numero' => $numeroTicket,
                    ]
                );

                /*
             * No actualizamos la recepción.
             *
             * La relación ya queda establecida mediante:
             *
             * tickets_reparacion.recepcion_id
             */

                $this->ticket = $ticket->fresh();

                Log::info(
                    'RegistrarRecepcion: ticket preparado para Livewire',
                    [
                        'ticket_id' => $this->ticket->id,
                        'ticket_numero' => $this->ticket->numero,
                    ]
                );
            });
        } catch (Throwable $e) {

            Log::error(
                'RegistrarRecepcion: ERROR generando ticket',
                [
                    'solicitud_id' => $this->solicitud->id,
                    'usuario_id' => Auth::id(),
                    'exception' => get_class($e),
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                ]
            );

            $this->addError(
                'general',
                'No se pudo generar el ticket.'
            );

            return;
        }

        /**
         * --------------------------------------------------------
         * 4. RECARGAR RELACIONES
         * --------------------------------------------------------
         */

        $this->solicitud->refresh()->load([
            'activo.dependencia',
            'activo.categoria',
            'usuario',
            'turno',
            'recepciones.ticket',
        ]);

        $recepcion = $this->solicitud
            ->recepciones()
            ->latest('id')
            ->first();

        $this->ticket = $recepcion?->ticket;

        Log::info(
            'RegistrarRecepcion: ticket recargado después de transacción',
            [
                'solicitud_id' => $this->solicitud->id,
                'recepcion_id' => $recepcion?->id,
                'ticket_id' => $this->ticket?->id,
                'ticket_numero' => $this->ticket?->numero,
            ]
        );

        /**
         * --------------------------------------------------------
         * 5. MENSAJE FINAL
         * --------------------------------------------------------
         */

        session()->flash(
            'success',
            'El ticket fue generado correctamente.'
        );

        Log::info(
            'RegistrarRecepcion: FIN generarTicket() OK',
            [
                'solicitud_id' => $this->solicitud->id,
                'ticket_id' => $this->ticket?->id,
                'ticket_numero' => $this->ticket?->numero,
            ]
        );
    }

    /**
     * ============================================================
     * RENDER
     * ============================================================
     */
    public function render()
    {
        return view('livewire.reparaciones.registrar-recepcion');
    }
}
