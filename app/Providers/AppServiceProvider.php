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
use App\Models\Comunicacionescuarta;
use App\Models\Comunicacionescustodia;
use App\Models\Comunicacionesdseu;
use App\Models\Comunicacionesdto365;
use App\Models\Comunicacionesfamilia1;
use App\Models\Comunicacionesfamilia2;
use App\Models\Comunicacionesinvestigacion;
use App\Models\Comunicacionesjefatura;
use App\Models\Comunicacionesnarco;
use App\Models\Comunicacionesprimera;
use App\Models\Comunicacionesquinta;
use App\Models\Comunicacionesrecurso;
use App\Models\Comunicacionessegunda;
use App\Models\Comunicacionestercera;
use App\Observers\ComunicacionesAutomotoreObserver;
use App\Observers\ComunicacionesCientificaObserver;
use App\Observers\ComunicacionesComplejoObserver;
use App\Observers\ComunicacionesCuartaObserver;
use App\Observers\ComunicacionesCustodiaObserver;
use App\Observers\ComunicacionesdseuObserver;
use App\Observers\Comunicacionesdto365Observer;
use App\Observers\Comunicacionesfamilia1Observer;
use App\Observers\Comunicacionesfamilia2Observer;
use App\Observers\ComunicacionesinvestigacionesObserver;
use App\Observers\ComunicacionesjefaturaObserver;
use App\Observers\ComunicacionesnarcoObserver;
use App\Observers\ComunicacionesprimeraObserver;
use App\Observers\ComunicacionesquintaObserver;
use App\Observers\ComunicacionesrecursoObserver;
use App\Observers\ComunicacionessegundaObserver;
use App\Observers\ComunicacionesterceraObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

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
        Comunicacionescuarta::observe(ComunicacionesCuartaObserver::class);
        Comunicacionescustodia::observe(ComunicacionesCustodiaObserver::class);
        Comunicacionesdseu::observe(ComunicacionesdseuObserver::class);
        Comunicacionesdto365::observe(Comunicacionesdto365Observer::class);
        Comunicacionesfamilia1::observe(Comunicacionesfamilia1Observer::class);
        Comunicacionesfamilia2::observe(Comunicacionesfamilia2Observer::class);
        Comunicacionesinvestigacion::observe(ComunicacionesinvestigacionesObserver::class);
        Comunicacionesjefatura::observe(ComunicacionesjefaturaObserver::class);
        Comunicacionesnarco::observe(ComunicacionesnarcoObserver::class);
        Comunicacionesprimera::observe(ComunicacionesprimeraObserver::class);
        Comunicacionesquinta::observe(ComunicacionesquintaObserver::class);
        Comunicacionesrecurso::observe(ComunicacionesrecursoObserver::class);
        Comunicacionessegunda::observe(ComunicacionessegundaObserver::class);
        Comunicacionestercera::observe(ComunicacionesterceraObserver::class);
    }


}
