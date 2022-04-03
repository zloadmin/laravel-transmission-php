<?php
declare(strict_types=1);
namespace TransmissionPHP\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Transmission
 * @package TransmissionPHP\Facades
 */
class Transmission extends Facade
{
    protected static function getFacadeAccessor() {
        return 'transmission';
    }
}