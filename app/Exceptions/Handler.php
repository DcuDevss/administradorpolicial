<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;


class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
            $this->reportable(function (QueryException $e) {
        Log::error('SQL_FAIL', [
            'sql' => $e->getSql(),
            'bindings' => $e->getBindings(),
            'message' => $e->getMessage(),
            'url' => request()->fullUrl(),
        ]);
    });
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
