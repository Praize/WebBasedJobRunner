<?php
return [
    'allowed_classes' => [
        \App\Jobs\TestJob::class => ['performTask'], # Allow only the 'performTask' method in TestJob
    ],
];
