<?php

/**
 * Environment Configuration Loader for CampusFix.
 * Loads key-value pairs from .env into putenv(), $_ENV, and $_SERVER.
 */

if (!function_exists('load_env')) {
    function load_env($filePath = null)
    {
        static $isLoaded = false;
        if ($isLoaded && $filePath === null) {
            return;
        }

        if ($filePath === null) {
            $filePath = dirname(__DIR__) . DIRECTORY_SEPARATOR . '.env';
        }

        if (!file_exists($filePath) || !is_readable($filePath)) {
            return;
        }

        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines === false) {
            return;
        }

        foreach ($lines as $line) {
            $line = trim($line);

            // Skip comments and empty lines
            if ($line === '' || $line[0] === '#' || $line[0] === ';') {
                continue;
            }

            // Remove leading 'export ' if present
            if (substr($line, 0, 7) === 'export ') {
                $line = trim(substr($line, 7));
            }

            // Must contain '='
            if (strpos($line, '=') === false) {
                continue;
            }

            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);

            // Handle quoted values
            if ($value !== '' && ($value[0] === '"' || $value[0] === "'")) {
                $quote = $value[0];
                $endPos = strrpos($value, $quote);
                if ($endPos > 0) {
                    $value = substr($value, 1, $endPos - 1);
                }
            } else {
                // Strip trailing comments on unquoted values (e.g. VALUE # comment)
                if (preg_match('/\s+#/', $value, $matches, PREG_OFFSET_CAPTURE)) {
                    $value = trim(substr($value, 0, $matches[0][1]));
                }
            }

            putenv("{$name}={$value}");
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }

        $isLoaded = true;
    }
}

if (!function_exists('env')) {
    function env($key, $default = null)
    {
        $val = $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key);
        if ($val === false || $val === null) {
            return $default;
        }
        return $val;
    }
}

// Automatically load root .env
load_env();

