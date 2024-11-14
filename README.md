# WebBasedJobRunner 🔃
Laravel Applications that runs custom tasks and Job queues


## Available automation Script

In the main project directory, you can run: a php script called <i>background_script.php</i>\
This is the custom background runner making use of vanilla PHP. It makes use of a function and accepts parameters. \

(To run the background_script.php) - paste below in your cmd 👇\
php background_script.php

## Instructions to run background_script.php

All you need to do is php <<name of script>> ... in this case background_script.php\
It will log the results and parameters on laravels build in log file within storage.It logs successfully. Try it out 😊

## task 2 
This task is complete. I created a a helper class / function that is called <i>runBackgroundJob</i> , it executes in the background. Use the below command to test.\

php artisan background:job "App\Jobs\TestJob" "performTask" '{"param1":"value1", "param2":"value2"}' 3 

## task 3 error handling etc

I create a separate log file using Laravels "log::channel" it successfully logs the error on the  background_jobs_errors.\
The check is being done. Logs status and timestamped.

## task 4 (Security Requirements)
If unauthorized attempts to run a job are detected, we log them immediately and throw an exception without executing the job.\
I have a <i>App\Jobs\TestJob </i> with the performTask method in <B>config/background_jobs.php</b>

## more on usage 👨‍🏫

The below command can be modified anyhow. You can change the className to trigger a log file if the class exits or not. Same with the "method" / "parameters". The last digit at the end\
is for <p style="background:limeGreen">The Attempts</p> OVER 3 it will trigger an a log file with a <i>Job permanently failed after max attempts</i>\

Typically theb file "laravel.log" will log any information from the Log::debug.\
Another file called "background_jobs_errors.log" will log errors from the command.

play with the below command 👇\
php artisan background:job "App\Jobs\TestJob" "performTask" '{"param1":"value1", "param2":"value2"}' 3 \

(To run the background_script.php) - paste below in your cmd 👇\
php background_script.php

# WebBasedJobRunner ⚙️🌍 (Dashboard)
Dashboard showing Jobs running and their priorities.In addition CRUD functionality is implemented for the Admin to make necessarry changes where needed.




