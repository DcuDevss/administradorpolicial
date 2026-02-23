<?php

namespace App\Providers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;

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
    }


}
