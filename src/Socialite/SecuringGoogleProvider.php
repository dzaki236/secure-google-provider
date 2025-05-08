<?php

namespace Dzaki236\SecureGoogleProvider\Socialite;

use Laravel\Socialite\Two\GoogleProvider;
use GuzzleHttp\Client;

class SecuringGoogleProvider extends GoogleProvider
{
    protected function getHttpClient()
    {
        return new Client([
            'verify' => '../../certs/cacert.pem',
            'verify' => false, // NOT RECOMMENDED for production
        ]);
    }
}
