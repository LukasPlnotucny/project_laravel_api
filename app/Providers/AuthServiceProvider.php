<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        ResetPassword::createUrlUsing(function (mixed $notifiable, string $token) {
            $spa_url = env('SPA_URL');
            $email = $notifiable->getEmailForPasswordReset();

            return "$spa_url/reset-password/$token?email=$email";
        });
    }
}
