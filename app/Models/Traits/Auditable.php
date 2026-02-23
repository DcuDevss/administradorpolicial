<?php

namespace App\Models\Traits;

use App\Helpers\AuditLogger;

trait Auditable
{
    protected static function bootAuditable()
    {
        static::created(function ($model) {
            AuditLogger::log(
                static::auditAction('create'),
                $model,
                static::auditDescription('create', $model)
            );
        });

        static::updated(function ($model) {
            // EVITAR DUPLICADO: Si el modelo fue creado en este mismo ciclo de vida, no auditar update inicial
            if ($model->wasRecentlyCreated) {
                return;
            }

            AuditLogger::log(
                static::auditAction('update'),
                $model,
                static::auditDescription('update', $model)
            );
        });

        static::deleted(function ($model) {
            AuditLogger::log(
                static::auditAction('delete'),
                $model,
                static::auditDescription('delete', $model)
            );
        });
    }

    protected static function auditAction(string $event): string
    {
        return $event; // create | update | delete
    }

    protected static function auditDescription(string $event): string
    {
        return match ($event) {
            'create' => 'Alta',
            'update' => 'Edición', // Se habilita para evitar el "Update" en inglés
            'delete' => 'Eliminación',
            default  => ucfirst($event),
        };
    }
}
