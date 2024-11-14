# WebBasedJobRunner 🔃
Laravel Applications that runs custom tasks and Job queues


## Available automation Script

In the main project directory, you can run: a php script called <i>background_script.php</i>\
This is the custom background runner making use of vanilla PHP. It makes use of a function and accepts parameters. \

## Instructions to run background_script.php

All you need to do is:
(To run the background_script.php) - paste below in your cmd 👇\
php background_script.php

It will log the results and parameters on laravels build in log file within storage.It logs successfully. Try it out 😊

## task 2 
This task is complete. I created a a helper class / function that is called <i>runBackgroundJob</i> , it executes in the background. Use the below command to test.\

php artisan background:job "App\Jobs\TestJob" "performTask" '{"param1":"value1", "param2":"value2"}' 3 

## task 3 error handling etc

I create a separate log file using Laravels "log::channel" it successfully logs the error on the  background_jobs_errors\
The check is being done. Logs status and timestamped.

## task 4 (Security Requirements)
If unauthorized attempts to run a job are detected, we log them immediately and throw an exception without executing the job\
I have a <i>App\Jobs\TestJob </i> with the performTask method in <B>config/background_jobs.php</b>

## more on usage 👨‍🏫

The below command can be modified anyhow. You can change the className to trigger a log file if the class exits or not. Same with the "method" / "parameters". The last digit at the end\
is for <p style="background:limeGreen">The Attempts</p> OVER 3 it will trigger an a log file with a <i>Job permanently failed after max attempts</i>\

Typically theb file "laravel.log" will log any information from the Log::debug\
Another file called "background_jobs_errors.log" will log errors from the command.

play with the below command 👇\
php artisan background:job "App\Jobs\TestJob" "performTask" '{"param1":"value1", "param2":"value2"}' 3\
Alternatively go to windows task scheduler / linux cron job (use the same command at the top) set a time interval of 5 , 6 or 10 min to run this task automatically.

(To run the background_script.php) - paste below in your cmd 👇\
php background_script.php

# WebBasedJobRunner ⚙️🌍 (Dashboard "ADVANCE") 
Dashboard showing Jobs running and their priorities.In addition CRUD functionality is implemented for the Admin to make necessarry changes where needed.\

1st. Go to env file: write easypeasy as database. Put your user and password\
2nd. run php artisan migrate\
3rd. run <strong> php artisan server </strong>\
4th. click on the link to view app\

## main page (/)
The first container is a "myself" click on it ,you will be taken to my LinkedIn Profile\
The second will take your the "TASK RUNNER LARAVEL APP"
![Screenshot-front ](https://github.com/user-attachments/assets/995e41e4-5701-452f-a431-5f60f97441c5)

## dashboard page (/jobs)
Show the listed jobs running. If it is empty be sure to run this request / url <strong> (http://127.0.0.1:8000/trigger-job) </strong> ❗\
This will create / trigger a job and write to the \
Here you view logs of that specific Job cancel it
![image](https://github.com/user-attachments/assets/340b96c9-7921-4293-b8cb-ddd7539ca40d)

## dashboard page (/jobs/<id>/view-log)
This seconds show more information about that specific JOB Task


