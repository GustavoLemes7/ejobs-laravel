<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\App;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        $middleware->alias([
            'user.type' => \App\Http\Middleware\EnsureUserTypeIsDefined::class,
            'register.company' => \App\Http\Middleware\EnsureRegisterCompany::class,
            'register.candidate' => \App\Http\Middleware\EnsureRegisterCandidate::class,
            'guest.onboarding' => \App\Http\Middleware\EnsureBlockOnboardingAccess::class,
            'application' => \App\Http\Middleware\EnsureApplication::class,
            'company' => \App\Http\Middleware\EnsureCompany::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();