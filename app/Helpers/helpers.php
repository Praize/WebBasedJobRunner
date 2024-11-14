<?php

use Illuminate\Support\Facades\Log;

/**
 * Run a class method in the background.
 *
 * @param string $className The class to instantiate.
 * @param string $method The method to call on the class.
 * @param array $params The parameters to pass to the method.
 * @return void
 */
function runBackgroundJob($className, $method, $params = [], $maxAttempts = 3)
{

     # Load approved classes from config
     $allowedClasses = config('background_jobs.allowed_classes');

     # Validate that the class and method are approved
     if (!array_key_exists($className, $allowedClasses) || !in_array($method, $allowedClasses[$className])) {
         Log::warning("Unauthorized job attempt", [
             'class' => $className,
             'method' => $method,
         ]);
         throw new \Exception("Unauthorized background job: {$className}::{$method}.");
     }

    # Encode parameters as JSON so they can be passed as a single argument
    $paramsJson = json_encode($params);
     
    # Determine the PHP executable path
    $phpPath = PHP_BINARY;
    $artisanPath = base_path('artisan');
    
    # Create the command to run the job script
    $command = "{$phpPath} {$artisanPath} background:job {$className} {$method} '{$paramsJson}'";

    # Add background execution flag depending on the OS
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        # Windows: start a new process in the background
        pclose(popen("start /B " . $command, "r"));
    } else {
        # Unix-based: redirect output and fork to the background
        shell_exec($command . " > /dev/null 2>&1 &");
    }

    Log::info("Background job initiated", [
        'class' => $className,
        'method' => $method,
        'params' => $params,
    ]);
}
