<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Fix Render tempnam() / Blade cache issue
        ini_set('sys_temp_dir', storage_path('framework/cache'));

        // Force HTTPS on production (Render fix)
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }

        // ==============================
        // AUTO SEED ADMIN (SAFE)
        // ==============================
        try {
            if (Schema::hasTable('users')) {

                $adminExists = User::where('email', 'admin@admin.com')->exists();

                if (!$adminExists) {
                    User::create([
                        'name' => 'Admin',
                        'email' => 'admin@admin.com',
                        'password' => Hash::make('password'),
                        'role' => 'admin',
                    ]);
                }
            }
        } catch (\Throwable $e) {
            // silently ignore errors during boot
        }
    }
}