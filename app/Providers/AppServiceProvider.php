<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // Otorisasi sederhana: admin hanya email admin@gmail.com
        // User login lainnya hanya boleh akses menu (module Dashboard).
        \Illuminate\Support\Facades\Gate::define('admin', function ($user) {
            return $user && $user->email === 'admin@gmail.com';
        });
    }
}
