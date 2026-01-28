<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Auditable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy(\App\Observers\GeneralinformaticaObserver::class)]

class Generalinformatica extends Model
{
    use HasFactory;
    use Auditable;
    //'investigacione_id','administracion_id','jefatura_id','destacamento_id','recurso_humano_id','serviciosespeciale_id',
    protected $fillable = [
        'dependencia_ushuaia_id',
        'cientifica_id',
        'investigacione_id',
        'serviciosespeciale_id',
        'custodiagubernamentale_id',
        'software_instalados',
        'tipodispositivo_id',
        'tipodeoficina_id',
        'cantidadram_id',
        'modelo',
        'marca',
        'procesador',
        'monitor',
        'sistema_operativo',
        'fecha_inventario',
        'activo',
        'detalles_inventario',
        'codigo_qr',
        'slotmemoria_id',
        'tipo_ram',
        'tipo_disco',
        'cant_almacenamiento',
        'tipo_mouse',
        'tipo_teclado',
        'tipo_impresora',
        'fecha_service',
        'tipo_service'
    ];

    public function cientifica()
    {
        return $this->belongsTo('App\Models\Cientifica', 'cientifica_id', 'id');
    }
    public function custodiagubernamentale()
    {
        return $this->belongsTo('App\Models\Custodiagubernamentale', 'custodiagubernamentale_id', 'id');
    }
    public function serviciosespeciale()
    {
        return $this->belongsTo('App\Models\Serviciosespeciale', 'serviciosespeciale_id', 'id');
    }
    public function destacamento()
    {
        return $this->belongsTo('App\Models\Destacamento', 'destacamento_id', 'id');
    }
    public function investigacione()
    {
        return $this->belongsTo('App\Models\Investigacione', 'investigacione_id', 'id');
    }
    public function recursohumano()
    {
        return $this->belongsTo('App\Models\RecursoHumano', 'recurso_humano_id', 'id');
    }
    public function jefatura()
    {
        return $this->belongsTo('App\Models\Jefatura', 'jefatura_id', 'id');
    }
    public function administracion()
    {
        return $this->belongsTo('App\Models\Administracion', 'administracion_id', 'id');
    }
    public function tipodispositivo()
    {
        return $this->belongsTo('App\Models\Tipodispositivo', 'tipodispositivo_id', 'id');
    }
    public function tipodeoficina()
    {
        return $this->belongsTo('App\Models\Tipodeoficina', 'tipodeoficina_id', 'id');
    }
    public function cantidadram()
    {
        return $this->belongsTo('App\Models\Cantidadram', 'cantidadram_id', 'id');
    }
    public function slotmemoria()
    {
        return $this->belongsTo('App\Models\Slotmemoria', 'slotmemoria_id', 'id');
    }
    public function dependenciaushuaia()
    {
        return $this->belongsTo('App\Models\DependenciaUshuaia', 'dependencia_ushuaia_id', 'id');
    }
    public function auditorias()
    {
        return $this->hasMany(AuditoriaDetalleInventario::class);
    }



    public function auditLabel(): string
    {
        $map = [
            'dependenciaushuaia'     => 'Ushuaia',
            'cientifica'             => 'Ushuaia',
            'serviciosespeciale'     => 'Ushuaia',
            'custodiagubernamentale' => 'Ushuaia',
            'investigacione'         => 'Ushuaia',
            'recursohumano'          => 'Ushuaia',
            'jefatura'               => 'Ushuaia',
            'administracion'         => 'Ushuaia',
        ];

        foreach ($map as $relation => $city) {
            if ($this->$relation) {
                return $city . ' – ' . $this->$relation->nombre;
            }
        }

        return 'Ushuaia – Sin dependencia';
    }
}
