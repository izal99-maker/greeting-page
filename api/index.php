<?php
// Remove any empty environment variables that Vercel might pass
foreach ($_ENV as $key => $value) {
    if ($value === '') {
        unset($_ENV[$key]);
        unset($_SERVER[$key]);
        putenv($key);
    }
}
foreach (getenv() as $key => $value) {
    if ($value === '') {
        unset($_ENV[$key]);
        unset($_SERVER[$key]);
        putenv($key);
    }
}

require __DIR__ . '/../public/index.php';
