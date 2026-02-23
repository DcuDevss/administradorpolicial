<?php

namespace App\Helpers;

use App\Models\Audit;
use Illuminate\Database\Eloquent\Model;

class AuditLogger
{
    public static function log(
        string $action,
        ?Model $model = null,
        ?string $description = null
    ) {
        Audit::create([
            'user_id' => auth()->id() ?? null,

            'action'         => $action,
            'description'    => $description,
            'auditable_type' => $model ? get_class($model) : null,
            'auditable_id'   => $model?->id,
            'ip_address'     => request()->ip(),
            'user_agent'     => request()->userAgent(),
        ]);
    }
}
