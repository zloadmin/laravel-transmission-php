<?php

declare(strict_types=1);
namespace TransmissionPHP\Providers;

use Illuminate\Support\ServiceProvider;
use Transmission\Transmission;

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
            __DIR__.'/../../config/transmission.php' => config_path('transmission.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('transmission', function () {
            return new Transmission();
        });
    }
}
