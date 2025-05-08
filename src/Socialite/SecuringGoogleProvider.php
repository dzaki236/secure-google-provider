<?php
// define("SAFE",true);
namespace Dzaki236\SecureGoogleProvider\Socialite;

use Laravel\Socialite\Two\GoogleProvider;
use GuzzleHttp\Client;

class SecuringGoogleProvider extends GoogleProvider
{
    /**
     * Invoke Http Client function from parent.
     *
     * @return \GuzzleHttp\Client;
     */
    protected function getHttpClient(): Client
    {
        return new Client([
            'verify' => __DIR__ . '/../../certs/cacert.pem',
            // NOT RECOMMENDED WAY for production!
            /* 'verify' => false,*/
        ]);
    }
}
