<?php
// define("SAFE",true);
namespace Dzaki236\SecureGoogleProvider\Socialite;

use Laravel\Socialite\Two\GoogleProvider;
use GuzzleHttp\Client;

class SecuringGoogleProvider extends GoogleProvider
{
    /**
     * @var verifyConfig;
     */
    protected array $verifyConfig = array();
    /**
     * Invoke construction params.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $clientId
     * @param string $clientSecret
     * @param string $redirectUrl
     * @param array $verifyConfig
     */
    public function __construct(\Illuminate\Http\Request $request, $clientId, $clientSecret, $redirectUrl, array $verifyConfig)
    {
        $this->verifyConfig = $verifyConfig;
        parent::__construct($request, $clientId, $clientSecret, $redirectUrl);
    }
    /**
     * Invoke Http Client function from parent.
     *
     * @return \GuzzleHttp\Client
     */
    protected function getHttpClient(): Client
    {
        $verify = !empty($this->verifyConfig['force'])
            ? __DIR__ . '/../../certs/cacert.pem'
            : false;
        return new Client([
            'verify' => $verify,
        ]);
    }
}
