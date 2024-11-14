<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Events\Dispatchable;

use Illuminate\Http\Request;
use App\Jobs\TestJob;

class JobController extends Controller 
{
    public function dispatchJob(Request $request)
    {
        $priority = $request->input('priority', 9);  # Default priority to 0 if not provided
        $delay = $request->input('delay', 4);        # Default delay to 0 seconds if not provided

        # Dispatch the job with the specified priority and delay
        // $job = new TestJob('value1', 'value2', $priority, $delay);
        // dispatch($job)->onQueue('default');

        TestJob::dispatch('work', 'train' , $priority, $delay)
    ->delay(now()->addSeconds(10)); // Example delay of 10 secon

        return response()->json(['status' => 'Job dispatched with priority and delay']);
    }
}
