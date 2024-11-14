

@extends('admin.jobs.layouts')

@section('title',"Easy Peasy")
    <div class="container pl-5">

        @section('content')
        <!-- resources/views/admin/jobs/view_log.blade.php -->
        <div class="p-5 bg-light">

        <h2 class="p-5 display-5">Job Log for Job #{{ $job->id }}</h2>

        <p class="para text-danger">Status: {{ $job->available_at ? 'Failed' : 'Completed' }}</p>
        <p class="para"><span class="badge bg-info text-dark">Attempts</span>: {{ $job->attempts }}</p>
        <p class="para"><span class="badge bg-info text-dark">Priority</span>: {{ $job->priority }}</p>
        <p class="para"><span class="badge bg-info text-dark">Delay</span>: {{ $job->delay }} seconds</p>
        <p>Log Data: <!-- Show detailed log here if available --> </p>

        <a class="btn btn-primary" href="{{ route('admin.jobs.index') }}">👈 Back to Dashboard</a>

        @endsection
    </div>
</div>
@section('scripts')
    <!-- Some JS and styles -->
@endsection