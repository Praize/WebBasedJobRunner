<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $param1;
    public $param2;
    /**
     * Create a new job instance.
     */
    // public function __construct($param1, $param2)
    // {
    //     $this->param1 = $param1;
    //     $this->param2 = $param2;
    // }
    public function __construct($param1, $param2, $priority = 0, $delay = 0)
    {
        $this->param1 = $param1;
        $this->param2 = $param2;
        $this->priority = $priority;
        $this->delay = $delay;

        $this->onQueue('default')->delay(now()->addSeconds($delay));
    }

    /**
     * Execute the job.
     */
    public function performTask()
    {
        // Your job logic here
        Log::info("Performing task with parameters", [
            'param1' => $this->param1,
            'param2' => $this->param2,
        ]);

        // Example of some task being performed
        $result = "Task performed with {$this->param1} and {$this->param2}";

        Log::info("Task result", [
            'result' => $result,
        ]);

        return $result;
    }
}
