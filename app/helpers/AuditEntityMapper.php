<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class AuditEntityMapper
{
    public static function label(string $auditableType): string
    {
        $class = class_basename($auditableType);

        return match (true) {

            // 📡 Comunicaciones (EXISTENTE)
            str_starts_with($class, 'Comunicaciones') =>
            self::comunicaciones($class),

            // 👤 Usuarios
            $class === 'User' =>
            'Usuario',

            // 🔐 Roles
            $class === 'Role' =>
            'Rol',

            // 🏙️ Rio Grande / Ushuaia (NUEVO)
            Str::startsWith(Str::lower($class), 'riogrande') ||
                Str::startsWith(Str::lower($class), 'ushuaia') =>
            self::ciudadEntidad($class),

            // 🧠 fallback general
            default =>
            self::humanize($class),
        };
    }

    /* ================= COMUNICACIONES ================= */

    private static function comunicaciones(string $class): string
    {
        return match ($class) {
            'Comunicacionesprimera'  => 'Comunicaciones – Primera (Ushuaia)',
            'Comunicacionessegunda'  => 'Comunicaciones – Segunda (Ushuaia)',
            'Comunicacionesjefatura' => 'Comunicaciones – Jefatura (Ushuaia)',
            default                  => 'Comunicaciones',
        };
    }

    /* ================= CIUDADES ================= */

    private static function ciudadEntidad(string $class): string
    {
        $lower = Str::lower($class);

        $city = str_starts_with($lower, 'riogrande')
            ? 'Río Grande'
            : 'Ushuaia';

        $entity = Str::of($class)
            ->replace(['Riogrande', 'Ushuaia'], '')
            ->snake(' ')
            ->replace('_', ' ')
            ->title();

        return trim("{$city} – {$entity}");
    }

    /* ================= FALLBACK ================= */

    private static function humanize(string $text): string
    {
        return Str::of($text)
            ->snake(' ')
            ->replace('_', ' ')
            ->title();
    }
}
