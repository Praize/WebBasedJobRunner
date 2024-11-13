<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       # register the helpers.php in the laravels bootstrtap
       $files = glob(app_path('Helpers') . ".php");
       foreach ($files as $key => $file) {
           require_once $file;
       }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
