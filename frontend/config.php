<?php

/**
 * Load environment variables from .env file
 * @throws Exception
 */
function loadEnv(string $file = '.env'): void
{
    $path = __DIR__ . "/$file";

    if (!file_exists($path)) {
        throw new Exception("$file not found");
    }


    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        if (str_starts_with(trim($line), '#')) {
            continue;
        }

        list($key, $value) = explode('=', $line, 2);

        $key = trim($key);
        $value = trim($value);

        $_ENV[$key] = $value;
    }
}

/**
 * Call the loadEnv function
 */
try {
    loadEnv();
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}
?>
