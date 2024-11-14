<!-- resources/views/admin/jobs/index.blade.php -->
@extends('admin.jobs.layouts')

@section('title',"Easy Peasy")
<div class="container">
@section('content')
<h1 class="bg-dark text-white p-5 display-4">Job Dashboard 🔃</h1>

<table class="table table caption-top">
    <thead>
        <tr>
            <th>ID</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Retry Count</th>
            <th>Delay (seconds)</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jobs as $job)
            <tr>
                <td>{{ $job->id }}</td>
                <td>{{ $job->available_at ? 'Failed' : 'Running' }}</td>
                <td>{{ $job->priority }}</td>
                <td>{{ $job->attempts }}</td>
                <td>{{ $job->delay }}</td>
                <td>
                    <a class="btn btn-link" href="{{ route('admin.jobs.view_log', $job->id) }}">View Log</a>
                    <form action="{{ route('admin.jobs.cancel', $job->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Cancel</button>

                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
</div>
@section('scripts')
    <!-- Some JS and styles -->
@endsection
