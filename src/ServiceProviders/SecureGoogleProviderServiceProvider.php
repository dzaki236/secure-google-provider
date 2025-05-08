<?php
// define("SAFE",true);
namespace Dzaki236\SecureGoogleProvider\ServiceProviders;

use Dzaki236\SecureGoogleProvider\Socialite\SecuringGoogleProvider;
use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Facades\Socialite;

class SecureGoogleProviderServiceProvider extends ServiceProvider
{
    /**
     * Bootstraping any application services from service provider.
     * @return void;
     */
    public function boot(): void
    {
        Socialite::extend('secure-google', function ($app) {
            $config = $app['config']['services.google'];
            return new SecuringGoogleProvider(
                request: $app['request'],
                clientId: $config['client_id'],
                clientSecret: $config['client_secret'],
                redirectUrl: $config['redirect'],
            );
        });
    }
}
