<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );

        $exceptions->render(function (\Throwable $e) {
            if ($e instanceof \ArgumentCountError && strpos($e->getMessage(), 'Manager::createDriver') !== false) {
                $trace = $e->getTrace();
                $output = "<h1>Manager Crash Debug</h1>";
                foreach ($trace as $t) {
                    if (isset($t['class']) && strpos($t['class'], 'Manager') !== false) {
                        $output .= "<p>Failing Manager Class: " . $t['class'] . "</p>";
                    }
                }
                return response($output, 500);
            }
        });
    })->create();
