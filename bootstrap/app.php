<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
	    api: __DIR__.'/../routes/api.php',
	    commands: __DIR__.'/../routes/console.php',
	    health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->append([
			EnsureFrontendRequestsAreStateful::class,
//	        SubstituteBindings::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
