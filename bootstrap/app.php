<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Active;
use App\Http\Middleware\Student;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => Admin::class,
            'active' => Active::class,
            'student' => Student::class,
        ]);

        $middleware->group('admin_auth', [
            'auth',
            'verified',
            'active',
            'admin',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
