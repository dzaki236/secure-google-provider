<?php
// define("SAFE",true);
namespace Dzaki236\SecureGoogleProvider\Socialite;

use Laravel\Socialite\Two\GoogleProvider;
use GuzzleHttp\Client;

class SecuringGoogleProvider extends GoogleProvider
{
    /**
     * @var array
     */
    protected array $verifyConfig = [];

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
        return new Client([
            'verify' => $this->getVerifyPath(),
        ]);
    }
    /**
     * Invoke Http Client function from parent.
     *
     * @return string|bool
     */
    protected function getVerifyPath(): string|bool
    {

        // Check if verify exist
        if (!empty($this->verifyConfig['force']) && $this->verifyConfig['force'] == false) {
            # code...
            return __DIR__ . '/../../certs/cacert.pem';
        }
        return false;
    }
}
