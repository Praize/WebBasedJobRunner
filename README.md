# WebBasedJobRunner 🔃
Laravel Applications that runs custom tasks and Job queues


## Available autimation Script

In the main project directory, you can run:\
a php script called <i>background_script.php</i>\
This is the custom background runner making use of vanilla PHP. It makes use of a fucntion and accepts parameters. \

## Instructions to run background_script.php

All you need to do is php <name of script> ... in this case background_script.php\
It will log the results and parameters on laravels build in log file within storage.It logs successfully. Try it out 😊

## task 2 
This task is complete. I created a a helper class / function that is called <i>runBackgroundJob</i> , it executes in the background. Use the below command to test.\
php artisan background:job "App\Jobs\TestJob::class"  "performTask"  "['param1' => 'value1', 'param2' => 'value2']" "5"

## task 3 error handling etc
I create a separate log file using Laravels "log::channel" it success fully logs the error on the  background_jobs_errors.\
The check is being done. Logs status and timestamped.
