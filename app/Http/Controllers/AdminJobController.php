<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class AdminJobController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('priority', 'desc')->get();

        return view('admin.jobs.index', compact('jobs'));
    }

    public function cancelJob($id)
    {
        DB::table('jobs')->where('id', $id)->delete();

        return redirect()->route('admin.jobs.index')->with('status', 'Job canceled successfully.');
    }

    public function viewJobLog($id)
    {
        $job = Job::findOrFail($id);

        return view('admin.jobs.view_log', compact('job'));
    }
}
