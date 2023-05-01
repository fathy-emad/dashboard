<?php

namespace App\Providers;

use App\Helpers\Toastify;
use Illuminate\Support\ServiceProvider;

class ToastifyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Toastify::class, fn () => new Toastify());
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
