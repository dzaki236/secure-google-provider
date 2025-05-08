<?php

namespace Dzaki236\SecureGoogleProvider\ServiceProviders;

use Dzaki236\SecureGoogleProvider\Socialite\SecuringGoogleProvider;
use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Facades\Socialite;

class SecureGoogleProviderServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Socialite::extend('secure-google', function ($app) {
            $config = $app['config']['services.google'];

            return new SecuringGoogleProvider(
                $app['request'],
                $config['client_id'],
                $config['client_secret'],
                $config['redirect']
            );
        });
    }
}
