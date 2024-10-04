<?php

namespace App\Providers\Filament;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Filament::auth(function () {
            return auth('admin')->check() || auth('web')->check();
        });
    }

    public function register()
    {
        //
    }
}
