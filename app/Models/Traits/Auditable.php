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

    /*  protected static function auditAction(string $event): string
    {
        return match ($event) {
            'create' => 'Equipo Creado',
            'update' => 'Equipo Actualizado',
            'delete' => 'Equipo Eliminado',
        };
    } */

    protected static function auditAction(string $event): string
    {
        return $event; // create | update | delete
    }

    /*  protected static function auditDescription(string $event, $model): string
    {
        return match ($event) {
            'create' => 'Alta de ' . class_basename($model),
            'update' => 'Edición de ' . class_basename($model),
            'delete' => 'Eliminación de ' . class_basename($model),
        };
    } */

    protected static function auditDescription(string $event): string
    {
        return match ($event) {
            'create' => 'Alta',
            'update' => 'Edición',
            'delete' => 'Eliminación',
            default  => ucfirst($event),
        };
    }
}
