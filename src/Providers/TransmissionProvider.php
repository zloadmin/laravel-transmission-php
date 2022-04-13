<?php

declare(strict_types=1);

namespace TransmissionPHP\Providers;

use Illuminate\Support\ServiceProvider;
use Transmission\Transmission;
use Transmission\Client;


/**
 * Class TransmissionProvider
 * @package TransmissionPHP\Providers
 */
class TransmissionProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/transmission.php' => config_path('transmission.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $client = new Client((string)config('transmission.host'), (int)config('transmission.port'), (string)config('transmission.path'));
        $username = (string)config('transmission.username');
        $password = (string)config('transmission.password');
        if ($username) {
            $client->authenticate($username, $password);
        }
        $this->app->bind('transmission', function () use ($client) {
            $transmission = new Transmission();
            $transmission->setClient($client);
            return $transmission;
        });
    }
}
