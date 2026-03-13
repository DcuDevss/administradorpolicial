<?php

namespace App\Providers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Livewire\Livewire;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ... tus observers ...
        if (app()->isLocal()) {
            DB::connection()->enableQueryLog();

            app()->terminating(function () {
                $queries = DB::getQueryLog();
                $totalMs = array_sum(array_column($queries, 'time'));

                Log::info('PERF', [
                    'url' => request()->fullUrl(),
                    'method' => request()->method(),
                    'queries_count' => count($queries),
                    'db_total_ms' => round($totalMs, 2),
                    'top5' => collect($queries)->sortByDesc('time')->take(5)->values()->all(),
                ]);
            });
        }
        if (app()->isLocal()) {
            DB::listen(function ($q) {
                if ($q->time >= 50) { // ms (ajustá: 30/50/100)
                    Log::warning('SLOW_SQL', [
                        'ms' => $q->time,
                        'sql' => $q->sql,
                        'bindings' => $q->bindings,
                        'url' => request()->fullUrl(),
                    ]);
                }
            });
        }

        Model::preventLazyLoading(!app()->isProduction());

// ✅ SIEMPRE registrar aliases (también en producción)
Livewire::component('informatica.general.index-inventario-general', \App\Http\Livewire\Informatica\General\IndexInventarioGeneral::class);
Livewire::component('informatica.investigaciones.index-investigaciones-general', \App\Http\Livewire\Informatica\Investigaciones\IndexInvestigacionesGeneral::class);
Livewire::component('informatica.administracion.index-administracion-general', \App\Http\Livewire\Informatica\Administracion\IndexAdministracionGeneral::class);
Livewire::component('informatica.recursos.index-recursos-general', \App\Http\Livewire\Informatica\Recursos\IndexRecursosGeneral::class);
Livewire::component('informatica.jefatura.index-jefatura-general', \App\Http\Livewire\Informatica\Jefatura\IndexJefaturaGeneral::class);
Livewire::component('informatica.trabajos.index-trabajos-informatica', \App\Http\Livewire\Informatica\Trabajos\IndexTrabajosInformatica::class);
Livewire::component('informatica.tolhuin.index-tolhuin-general', \App\Http\Livewire\Informatica\Tolhuin\IndexTolhuinGeneral::class);

Livewire::component('dcrginfo.riograndeinfo.index-riogrande-general', \App\Http\Livewire\Dcrginfo\Riograndeinfo\IndexRiograndeGeneral::class);

// Chart (revisá namespace real)
Livewire::component('trabajos-generales-chart', \App\Http\Livewire\TrabajosGeneralesChart::class);
// o si corresponde:
// Livewire::component('trabajos-generales-chart', \App\Http\Livewire\Informatica\Trabajos\TrabajosGeneralesChart::class);

// Comunicaciones - General
Livewire::component('comunicaciones.general.create-trabajo-general', \App\Http\Livewire\Comunicaciones\General\CreateTrabajoGeneral::class);
Livewire::component('comunicaciones.general.index-trabajo-general', \App\Http\Livewire\Comunicaciones\General\IndexTrabajoGeneral::class);

// Comunicaciones - Ushuaia
Livewire::component('comunicaciones.ushuaia.create-comunicaciones-ushuaia', \App\Http\Livewire\Comunicaciones\Ushuaia\CreateComunicacionesUshuaia::class);
Livewire::component('comunicaciones.ushuaia.index-comunicaciones-ushuaia', \App\Http\Livewire\Comunicaciones\Ushuaia\IndexComunicacionesUshuaia::class);

// Comunicaciones - Jefatura
Livewire::component('comunicaciones.jefatura.create-comunicaciones-jefatura', \App\Http\Livewire\Comunicaciones\Jefatura\CreateComunicacionesJefatura::class);

Livewire::component('comunicaciones.jefatura.index-comunicaciones-jefatura', \App\Http\Livewire\Comunicaciones\Jefatura\IndexComunicacionesJefatura::class);

Livewire::component(
    'comunicaciones.primera.create-comunicaciones-primera',
    \App\Http\Livewire\Comunicaciones\Primera\CreateComunicacionesPrimera::class
);

Livewire::component(
    'comunicaciones.primera.index-comunicaciones-primera',
    \App\Http\Livewire\Comunicaciones\Primera\IndexComunicacionesPrimera::class
);

// Comunicaciones - Segunda
Livewire::component(
    'comunicaciones.segunda.create-comunicaciones-segunda',
    \App\Http\Livewire\Comunicaciones\Segunda\CreateComunicacionesSegunda::class
);
Livewire::component(
    'comunicaciones.segunda.index-comunicaciones-segunda',
    \App\Http\Livewire\Comunicaciones\Segunda\IndexComunicacionesSegunda::class
);

// Comunicaciones - Tercera
Livewire::component(
    'comunicaciones.tercera.create-comunicaciones-tercera',
    \App\Http\Livewire\Comunicaciones\Tercera\CreateComunicacionesTercera::class
);
Livewire::component(
    'comunicaciones.tercera.index-comunicaciones-tercera',
    \App\Http\Livewire\Comunicaciones\Tercera\IndexComunicacionesTercera::class
);

// Comunicaciones - Cuarta
Livewire::component(
    'comunicaciones.cuarta.create-comunicaciones-cuarta',
    \App\Http\Livewire\Comunicaciones\Cuarta\CreateComunicacionesCuarta::class
);
Livewire::component(
    'comunicaciones.cuarta.index-comunicaciones-cuarta',
    \App\Http\Livewire\Comunicaciones\Cuarta\IndexComunicacionesCuarta::class
);

// Comunicaciones - Quinta
Livewire::component(
    'comunicaciones.quinta.create-comunicaciones-quinta',
    \App\Http\Livewire\Comunicaciones\Quinta\CreateComunicacionesQuinta::class
);
Livewire::component(
    'comunicaciones.quinta.index-comunicaciones-quinta',
    \App\Http\Livewire\Comunicaciones\Quinta\IndexComunicacionesQuinta::class
);

// Comunicaciones - Familia2
Livewire::component(
    'comunicaciones.familia2.create-comunicaciones-familia2',
    \App\Http\Livewire\Comunicaciones\Familia2\CreateComunicacionesFamilia2::class
);
Livewire::component(
    'comunicaciones.familia2.index-comunicaciones-familia2',
    \App\Http\Livewire\Comunicaciones\Familia2\IndexComunicacionesFamilia2::class
);

// Comunicaciones - Investigacion
Livewire::component(
    'comunicaciones.investigacion.create-comunicaciones-investigacion',
    \App\Http\Livewire\Comunicaciones\Investigacion\CreateComunicacionesInvestigacion::class
);
Livewire::component(
    'comunicaciones.investigacion.index-comunicaciones-investigacion',
    \App\Http\Livewire\Comunicaciones\Investigacion\IndexComunicacionesInvestigacion::class
);

Livewire::component(
    'comunicaciones.familia1.create-comunicaciones-familia1',
    \App\Http\Livewire\Comunicaciones\Familia1\CreateComunicacionesFamilia1::class
);
Livewire::component(
    'comunicaciones.familia1.index-comunicaciones-familia1',
    \App\Http\Livewire\Comunicaciones\Familia1\IndexComunicacionesFamilia1::class
);

// Comunicaciones - Administracion
Livewire::component(
    'comunicaciones.administracion.create-comunicaciones-administracion',
    \App\Http\Livewire\Comunicaciones\Administracion\CreateComunicacionesAdministracion::class
);
Livewire::component(
    'comunicaciones.administracion.index-comunicaciones-administracion',
    \App\Http\Livewire\Comunicaciones\Administracion\IndexComunicacionesAdministracion::class
);

// Comunicaciones - Narco
Livewire::component(
    'comunicaciones.narco.create-comunicaciones-narco',
    \App\Http\Livewire\Comunicaciones\Narco\CreateComunicacionesNarco::class
);
Livewire::component(
    'comunicaciones.narco.index-comunicaciones-narco',
    \App\Http\Livewire\Comunicaciones\Narco\IndexComunicacionesNarco::class
);

// Comunicaciones - Complejo
Livewire::component(
    'comunicaciones.complejo.create-comunicaciones-complejo',
    \App\Http\Livewire\Comunicaciones\Complejo\CreateComunicacionesComplejo::class
);
Livewire::component(
    'comunicaciones.complejo.index-comunicaciones-complejo',
    \App\Http\Livewire\Comunicaciones\Complejo\IndexComunicacionesComplejo::class
);

// Comunicaciones - Automotore
Livewire::component(
    'comunicaciones.automotore.create-comunicaciones-automotore',
    \App\Http\Livewire\Comunicaciones\Automotore\CreateComunicacionesAutomotore::class
);
Livewire::component(
    'comunicaciones.automotore.index-comunicaciones-automotore',
    \App\Http\Livewire\Comunicaciones\Automotore\IndexComunicacionesAutomotore::class
);
// Comunicaciones - Recurso
Livewire::component(
    'comunicaciones.recurso.create-comunicaciones-recurso',
    \App\Http\Livewire\Comunicaciones\Recurso\CreateComunicacionesRecurso::class
);
Livewire::component(
    'comunicaciones.recurso.index-comunicaciones-recurso',
    \App\Http\Livewire\Comunicaciones\Recurso\IndexComunicacionesRecurso::class
);
  // Comunicaciones - Dseu
Livewire::component(
    'comunicaciones.dseu.create-comunicaciones-dseu',
    \App\Http\Livewire\Comunicaciones\Dseu\CreateComunicacionesDseu::class
);
Livewire::component(
    'comunicaciones.dseu.index-comunicaciones-dseu',
    \App\Http\Livewire\Comunicaciones\Dseu\IndexComunicacionesDseu::class
);

// Comunicaciones - Custodia
Livewire::component(
    'comunicaciones.custodia.create-comunicaciones-custodia',
    \App\Http\Livewire\Comunicaciones\Custodia\CreateComunicacionesCustodia::class
);
Livewire::component(
    'comunicaciones.custodia.index-comunicaciones-custodia',
    \App\Http\Livewire\Comunicaciones\Custodia\IndexComunicacionesCustodia::class
);

// Comunicaciones - Cientifica
Livewire::component(
    'comunicaciones.cientifica.create-comunicaciones-cientifica',
    \App\Http\Livewire\Comunicaciones\Cientifica\CreateComunicacionesCientifica::class
);
Livewire::component(
    'comunicaciones.cientifica.index-comunicaciones-cientifica',
    \App\Http\Livewire\Comunicaciones\Cientifica\IndexComunicacionesCientifica::class
);

// Comunicaciones - Dto365
Livewire::component(
    'comunicaciones.dto365.create-comunicaciones-dto365',
    \App\Http\Livewire\Comunicaciones\Dto365\CreateComunicacionesDto365::class
);
Livewire::component(
    'comunicaciones.dto365.index-comunicaciones-dto365',
    \App\Http\Livewire\Comunicaciones\Dto365\IndexComunicacionesDto365::class
);
// Comunicaciones - Tolhuin
Livewire::component(
    'comunicaciones.tolhuin.create-comunicaciones-tolhuin',
    \App\Http\Livewire\Comunicaciones\Tolhuin\CreateComunicacionesTolhuin::class
);
Livewire::component(
    'comunicaciones.tolhuin.index-comunicaciones-tolhuin',
    \App\Http\Livewire\Comunicaciones\Tolhuin\IndexComunicacionesTolhuin::class
);

// Comunicaciones - DCU
Livewire::component(
    'comunicaciones.dcu.create-comunicaciones-dcu',
    \App\Http\Livewire\Comunicaciones\Dcu\CreateComunicacionesDcu::class
);
Livewire::component(
    'comunicaciones.dcu.index-comunicaciones-dcu',
    \App\Http\Livewire\Comunicaciones\Dcu\IndexComunicacionesDcu::class
);

// DCRG Comunicaciones - Rio Grande
Livewire::component(
    'dcrgcomu.riograndecomu.create-comunicaciones-riogrande',
    \App\Http\Livewire\Dcrgcomu\Riograndecomu\CreateComunicacionesRiogrande::class
);
Livewire::component(
    'dcrgcomu.riograndecomu.index-comunicaciones-riogrande',
    \App\Http\Livewire\Dcrgcomu\Riograndecomu\IndexComunicacionesRiogrande::class
);

       }


}
