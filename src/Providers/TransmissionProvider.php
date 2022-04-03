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
        $client = new Client(config('transmission.host'), config('transmission.port'), config('transmission.path'));
        $username = config('transmission.username');
        $password = config('transmission.password');
        if ($username && $password) {
            $client->authenticate($username, $password);
        }
        $this->app->bind('transmission', function () use ($client) {
            return new Transmission($client);
        });
    }
}
