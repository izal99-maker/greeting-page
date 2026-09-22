<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    echo "<h1>Fatal Error</h1>";
    $curr = $e;
    while ($curr) {
        echo "<h3>" . get_class($curr) . ": " . $curr->getMessage() . "</h3>";
        echo "<pre>" . $curr->getTraceAsString() . "</pre>";
        $curr = $curr->getPrevious();
    }
}
