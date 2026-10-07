<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ProfileSekolah;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Kirim $profil ke semua view
        View::composer('*', function ($view) {
            $view->with('profil', ProfileSekolah::first());
        });
    }
}
