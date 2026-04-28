<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Recursively load migrations from subdirectories
        $mainPath = database_path('migrations');

        // This gets all directories inside migrations (business, users, etc.)
        $directories = File::directories($mainPath);

        // We load the main folder + all subfolders
        $this->loadMigrationsFrom(array_merge([$mainPath], $directories));
    }
}
