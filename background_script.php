<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Container\Container;
use Illuminate\Contracts\Console\Kernel;

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

# Boot the Laravel application enabling the Illuminate to work
$kernel = $app->make(Kernel::class);
$kernel->bootstrap();

/**
 * Run a Laravel job in the background
 *
 * @param string $className
 * @param string $method
 * @param array $params
 */
function runInTheBackground($className, $method, $params = [])
{
    # Log job start
    Log::info("Running background job", [
        'class' => $className,
        'method' => $method,
        'params' => $params,
    ]);

    try {
        # Check if the class exists
        if (!class_exists($className)) {
            throw new Exception("Class {$className} not found.");
        }

        # Instantiate the class
        $instance = app()->make($className);

        # Check if the method exists on the instance
        if (!method_exists($instance, $method)) {
            throw new Exception("Method {$method} not found in class {$className}.");
        }

        # Call the method with the provided parameters
        $result = call_user_func_array([$instance, $method], $params);

        # Log success
        Log::info("Background job completed successfully", [
            'class' => $className,
            'method' => $method,
            'params' => $params,
            'result' => $result,
        ]);
    } catch (Exception $e) {
        # Log failure
        Log::error("Background job failed", [
            'class' => $className,
            'method' => $method,
            'params' => $params,
            'error' => $e->getMessage(),
        ]);
    }
}

# Example usage: Pass class, method, and parameters through CLI arguments
if ($argc < 3) {
    echo "Usage: php background_runner.php <class> <method> [params...]\n";
    exit(1);
}

$className = $argv[1];
$method = $argv[2];
$params = array_slice($argv, 3);

runInTheBackground($className, $method, $params);
