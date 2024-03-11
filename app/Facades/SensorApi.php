<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static float getTemperature(?int $sensorId = null)
 * @method static float getPressure(?int $sensorId = null)
 * @method static float getRevolutions(?int $sensorId = null)
 */
class SensorApi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sensor_api_service';
    }
}
