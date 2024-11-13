<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\TestJob;

class JobController extends Controller
{
    public function dispatchJob(Request $request)
    {
        $priority = $request->input('priority', 0);  # Default priority to 0 if not provided
        $delay = $request->input('delay', 0);        # Default delay to 0 seconds if not provided

        # Dispatch the job with the specified priority and delay
        $job = new TestJob('value1', 'value2', $priority, $delay);
        dispatch($job);

        return response()->json(['status' => 'Job dispatched with priority and delay']);
    }
}
