<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
            // Rate limit login new
        // $middleware->throttle('api', 5, 1); // 5 request per 1 menit
         // Protected middleware untuk dashboard

        $middleware->alias([
            'auth.jwt' => \App\Http\Middleware\AuthenticateJWT::class,
        ]);

        $middleware->api(prepend: [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        ]);

        $middleware->validateCsrfTokens(except: [
            'api/*', '/', '/login', '/dashboard'
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();
