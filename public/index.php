<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// HACK: We will hook into the autoloader or just prepend a file to catch it? No.
// Let's just override Manager's error by catching it in the Exception Handler?
// Wait, we can't easily. But we can register a shutdown function or error handler.
set_error_handler(function($errno, $errstr, $errfile, $errline, $errcontext = []) {
    if (strpos($errstr, 'Too few arguments to function Illuminate\Support\Manager::createDriver') !== false) {
        $trace = debug_backtrace();
        echo "<h1>Manager Crash Debug</h1>";
        foreach ($trace as $t) {
            if (isset($t['class']) && strpos($t['class'], 'Manager') !== false) {
                echo "<p>Class: " . $t['class'] . "</p>";
            }
        }
        exit;
    }
    return false;
});

$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
