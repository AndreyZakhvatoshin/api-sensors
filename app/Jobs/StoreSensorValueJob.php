<?php

namespace App\Jobs;

use App\Facades\SensorApi;
use App\Models\PressureSensor;
use App\Models\RevolutionsSensor;
use App\Models\TemperatureSensor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreSensorValueJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->storeTemperature();
        $this->storePressure();
        $this->storeRevolutions();
    }

    private function storeTemperature()
    {
        TemperatureSensor::query()->chunkById(100, function (Collection $sensors) {
            $sensors->each(function (TemperatureSensor $sensor) {
                $sensorValue = SensorApi::getTemperature($sensor->id);
                if (is_null($sensorValue)) {
                    return;
                }
                $sensor->values()->create(['value' => $sensorValue]);
            });
        });
    }

    private function storePressure()
    {
        PressureSensor::query()->chunkById(100, function (Collection $sensors) {
            $sensors->each(function (PressureSensor $sensor) {
                $sensorValue = SensorApi::getPressure($sensor->id);
                if (is_null($sensorValue)) {
                    return;
                }
                $sensor->values()->create(['value' => $sensorValue]);
            });
        });
    }

    private function storeRevolutions()
    {
        RevolutionsSensor::query()->chunkById(100, function (Collection $sensors) {
            $sensors->each(function (RevolutionsSensor $sensor) {
                $sensorValue = SensorApi::getRevolutions($sensor->id);
                if (is_null($sensorValue)) {
                    return;
                }
                $sensor->values()->create(['value' => $sensorValue]);
            });
        });
    }
}
