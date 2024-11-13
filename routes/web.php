<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminJobController;
use App\Http\Controllers\JobController;
   
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test-job', function () {
    // Example usage:
    runBackgroundJob(App\Commands\BackgroundJobCommand::class, 'handle', ['param1' => 'value1', 'param2' => 'value2']);
});


//Route::prefix('admin')->middleware(['auth', 'can:admin-access'])->group(function () {
    Route::get('/jobs', [AdminJobController::class, 'index'])->name('admin.jobs.index');
    Route::post('/jobs/{id}/cancel', [AdminJobController::class, 'cancelJob'])->name('admin.jobs.cancel');
    Route::get('/jobs/{id}/view-log', [AdminJobController::class, 'viewJobLog'])->name('admin.jobs.view_log');
    Route::get('/trigger-job', [JobController::class, 'dispatchJob'])->name('trigger.job');
//});
