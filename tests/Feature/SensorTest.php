<?php

namespace Tests\Feature;

use App\Models\PressureSensor;
use App\Models\PressureSensorValue;
use App\Models\RevolutionsSensor;
use App\Models\RevolutionsSensorValue;
use App\Models\TemperatureSensor;
use App\Models\TemperatureSensorValue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SensorTest extends TestCase
{
    use RefreshDatabase;

    public function testGetTemperature()
    {
        $request = [
            'date_start' => now()->startOfDay()->format('Y-m-d'),
            'date_end' => now()->addDay()->format('Y-m-d')
        ];
        $temperatureSensor = TemperatureSensor::factory()->create([
            'name' => 'defaultSensor'
        ]);
        $temperatureSensor->refresh();
        $sensorValue = TemperatureSensorValue::factory()->create([
            'sensor_id' => $temperatureSensor->id,
            'value' => 36.6
        ]);

        $this->get(route('sensor.temperature', $request))
            ->assertOk()
            ->assertJson([
                'data' => [
                    'id' => $temperatureSensor->id,
                    'name' => $temperatureSensor->name,
                    'unit' => $temperatureSensor->unit,
                    'values' => [
                        [
                            'id' => $sensorValue->id,
                            'sensor_id' => $sensorValue->sensor_id,
                            'value' => $sensorValue->value,
                        ]
                    ]
                ]
            ]);
    }

    public function testGetPressure()
    {
        $request = [
            'date_start' => now()->startOfDay()->format('Y-m-d'),
            'date_end' => now()->addDay()->format('Y-m-d')
        ];
        $pressureSensor = PressureSensor::factory()->create([
            'name' => 'defaultSensor'
        ]);
        $sensorValue = PressureSensorValue::factory()->create([
            'sensor_id' => $pressureSensor->id,
            'value' => 3213
        ]);

        $this->get(route('sensor.pressure', $request))
            ->assertOk();
    }

    public function testGetRevolutions()
    {
        $request = [
            'date_start' => now()->startOfDay()->format('Y-m-d'),
            'date_end' => now()->addDay()->format('Y-m-d')
        ];
        $revolutionsSensor = RevolutionsSensor::factory()->create([
            'name' => 'defaultSensor'
        ]);
        $sensorValue = RevolutionsSensorValue::factory()->create([
            'sensor_id' => $revolutionsSensor->id,
            'value' => 3213
        ]);

        $this->get(route('sensor.revolutions', $request))
            ->assertOk();
    }
}
