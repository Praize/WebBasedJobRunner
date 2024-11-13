

@extends('admin.jobs.layouts')

@section('title',"Easy Peasy")
<div class="container">
@section('content')
<!-- resources/views/admin/jobs/view_log.blade.php -->
<h2>Job Log for Job #{{ $job->id }}</h2>

<p>Status: {{ $job->failed_at ? 'Failed' : 'Completed' }}</p>
<p>Attempts: {{ $job->attempts }}</p>
<p>Priority: {{ $job->priority }}</p>
<p>Delay: {{ $job->delay }} seconds</p>
<p>Log Data: <!-- Show detailed log here if available --> </p>

<a href="{{ route('admin.jobs.index') }}">Back to Dashboard</a>
@endsection
</div>
@section('scripts')
    <!-- Some JS and styles -->
@endsection