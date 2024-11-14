<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;
class BackgroundJobCommand extends Command
{
    protected $signature = 'background:job {className} {method} {paramsJson} {maxAttempts=3}';
    protected $description = 'Command to run a custom job created by Seneme Nyuswa description';

    public function handle()
    {
        $className = $this->argument('className');
        $method = $this->argument('method');
        $params = json_decode($this->argument('paramsJson'), true);
        $maxAttempts = (int) $this->argument('maxAttempts');
        $attempts = 0;

        # Validate class and method names against whitelist
        $allowedClasses = Config::get('background_jobs.allowed_classes');

        if (!array_key_exists($className, $allowedClasses) || !in_array($method, $allowedClasses[$className])) {
            Log::warning("Unauthorized job execution attempt", [
                'class' => $className,
                'method' => $method,
            ]);
            throw new \Exception("Unauthorized job: {$className}::{$method}");
        }

        Log::info("Job started", [
            'class' => $className,
            'method' => $method,
            'params' => $params,
            'timestamp' => now(),
        ]);

        while ($attempts < $maxAttempts) {
            try {
                $attempts++;

                # Instantiate the class and check if the method exists
                $instance = app()->make($className);
                if (!method_exists($instance, $method)) {
                    throw new \Exception("Method {$method} not found in class {$className}.");
                }

                # Call the method with the provided parameters
                $result = call_user_func_array([$instance, $method], $params);

                Log::info("Job completed", [
                    'class' => $className,
                    'method' => $method,
                    'params' => $params,
                    'result' => $result,
                    'timestamp' => now(),
                ]);

                # Exit loop if job completes successfully
                return;

            } catch (\Exception $e) {
                # Log the error in a separate file
                Log::channel('background_info')->error("Job failed", [
                    'class' => $className,
                    'method' => $method,
                    'params' => $params,
                    'error' => $e->getMessage(),
                    'attempt' => $attempts,
                    'timestamp' => now(),
                ]);

                if ($attempts >= $maxAttempts) {
                    Log::info("Job permanently failed after max attempts", [
                        'class' => $className,
                        'method' => $method,
                        'params' => $params,
                        'timestamp' => now(),
                    ]);
                }
            }
        }
    }
}
