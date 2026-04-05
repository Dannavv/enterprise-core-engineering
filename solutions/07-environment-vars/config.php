<?php
/**
 * Config Loader: Manually parsing the .env file 🛠️
 */

function load_env($file_path) {
    if (!file_exists($file_path)) {
        return false;
    }

    // Read the file line by line
    $lines = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    foreach ($lines as $line) {
        // Skip comments
        if (strpos(trim($line), '#') === 0) continue;

        // Split Key=Value
        list($name, $value) = explode('=', $line, 2);
        
        $name = trim($name);
        $value = trim($value);

        // Populate both $_ENV and putenv() for getenv() usage
        $_ENV[$name] = $value;
        putenv("$name=$value");
    }
    
    return true;
}

// Load the environment variables from the .env file in the current directory
load_env(__DIR__ . '/.env');
