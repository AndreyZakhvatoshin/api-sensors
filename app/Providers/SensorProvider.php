<?php

namespace App\Providers;

use App\Services\SensorApi\SensorApiService;
use Illuminate\Support\ServiceProvider;

class SensorProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('sensor_api_service', function () {
            return resolve(SensorApiService::class);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
