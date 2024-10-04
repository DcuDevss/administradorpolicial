<?php

namespace App\Providers;

use App\Models\Comunicacionesrg;
use Illuminate\Support\ServiceProvider;
use App\Models\TrabajosGenerale;
use App\Observers\TrabajosGeneraleObserver;
use App\Models\TrabajosInformatico;
use App\Models\Generalinformatica;
use App\Observers\TrabajosInformaticoObserver;
use App\Models\Comunicacionestolhuin;
use App\Models\Comunicacionesushuaia;
use App\Models\Tolhuingenerale;
use App\Observers\ComunicacionesTolhuinObserver;
use App\Observers\ComunicacionesUshuaiaObserver;
use App\Observers\ComunicacionesrgObserver;
use App\Observers\GeneralinformaticaObserver;
use App\Observers\TolhuinGeneraleObserver;
use App\Models\Riograndegenerale;
use App\Observers\RiograndegeneraleObserver;
use App\Models\Comunicacionesdcu;
use App\Observers\ComunicacionesDcuObserver;
use App\Models\Comunicacionesadministracion;
use App\Observers\ComunicacionesAdministracionObserver;
use App\Models\Comunicacionesautomotore;
use App\Models\Comunicacionescientifica;
use App\Models\Comunicacionescomplejo;
use App\Observers\ComunicacionesAutomotoreObserver;
use App\Observers\ComunicacionesCientificaObserver;
use App\Observers\ComunicacionesComplejoObserver;

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
        TrabajosGenerale::observe(TrabajosGeneraleObserver::class);
        TrabajosInformatico::observe(TrabajosInformaticoObserver::class);
        Comunicacionestolhuin::observe(ComunicacionesTolhuinObserver::class);
        Comunicacionesushuaia::observe(ComunicacionesUshuaiaObserver::class);
        Comunicacionesrg::observe(ComunicacionesrgObserver::class);
        Generalinformatica::observe(GeneralinformaticaObserver::class);
        Tolhuingenerale::observe(TolhuingeneraleObserver::class);
        Riograndegenerale::observe(RiograndegeneraleObserver::class);
        Comunicacionesdcu::observe(ComunicacionesdcuObserver::class);
        Comunicacionesadministracion::observe(ComunicacionesadministracionObserver::class);
        Comunicacionesautomotore::observe(ComunicacionesautomotoreObserver::class);
        Comunicacionescientifica::observe(ComunicacionescientificaObserver::class);
        Comunicacionescomplejo::observe(ComunicacionesComplejoObserver::class);
    }


}
