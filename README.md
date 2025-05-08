# Secure google provider extends socialite package
## Announcement from google
Since 2025 at february google announcement some  policy for oAuth certs, even if you used it for production and https scheme, you need 'certs' for more secure in oAuth v2.

Sadly, Socialite package cannot provide to handle some secure certs ASAP.

## I got you guys 🙌
Have you got error like ```curl error 60: SSL certificate problem: unable to get local issuer certificate (see https:...```??, it means you have to secure your oAuth for google services.

By using this package, you don't have to waste your time, take it easy, i got you..

## Instalation
Requirement :
- Php^8.0
- Laravel 8+ (even better using laravel 10+)
- Socialite package (Any version with php ^8.0 compatiblity)
### Step Installation
```bash
$ composer require dzaki236/secure-google-provider
```
Or you can choose specific version by :
```bash
$ composer require dzaki236/secure-google-provider:^1.0
```
### So.. How to use?🤔
Well... in your controller or where you put your logic in laravel, you can find or make like this part :
```php
Socialite::driver('google')->redirect();
```
Don't forget to add some namespacing at controller or logic file :
```php
use Laravel\Socialite\Facades\Socialite;
```

But.. you still got error when you use ```google``` at parameter on ```driver``` function, you need to change it, from ```google``` to ```secure-google```.

By this example :
```php
Socialite::driver('secure-google')->redirect(); // For redirect, you will redirect to page oAuth by google services
```
To get user info after oAuth login state closed :
```php
$social_user = Socialite::driver('secure-google')->user(); // For redirect, you will redirect to page oAuth by google services
```
## Credits
- [Dzaki236](https://github.com/dzaki236)
## License
The MIT License (MIT). Please see [License File](https://github.com/dzaki236/secure-google-provider/blob/main/License) for more information.
