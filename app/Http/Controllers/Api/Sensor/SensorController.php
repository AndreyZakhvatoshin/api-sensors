<?php

namespace App\Http\Controllers\Api\Sensor;

use App\Facades\SensorApi;
use App\Http\Controllers\Controller;
use App\Http\Requests\PeriodRequest;
use App\Http\Resources\SensorResource;
use App\Models\TemperatureSensorValue;
use App\Services\SensorService;

class SensorController extends Controller
{
    public function __construct(
        private SensorService $sensorService
    ) {
    }

    /**
     * @param PeriodRequest $request
     * @return SensorResource
     */
    public function getTemperature(PeriodRequest $request)
    {
        $period = $request->validated();
        $values = $this->sensorService->getTemperatureValues($period);

        return new SensorResource($values);
    }

    /**
     * @param PeriodRequest $request
     * @return SensorResource
     */
    public function getPressure(PeriodRequest $request)
    {
        $period = $request->validated();
        $values = $this->sensorService->getPressureValues($period);

        return new SensorResource($values);
    }

    /**
     * @param PeriodRequest $request
     * @return SensorResource
     */
    public function getRevolutions(PeriodRequest $request)
    {
        $period = $request->validated();
        $values = $this->sensorService->getRevolutionsValues($period);

        return new SensorResource($values);
    }
}
