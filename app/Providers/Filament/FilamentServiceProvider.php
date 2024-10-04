<?php

namespace App\Providers\Filament;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Customize Filament authentication to check both 'admin' and 'web' guards
        Filament::auth(function () {
            // Check if the user is authenticated via either the 'admin' or 'web' guard
            return auth()->guard('admin')->check() || auth()->guard('web')->check();
        });
    }

    public function register()
    {
        //
    }
}

?>
