<?php

namespace App\Services;

use App\Models\PressureSensor;
use App\Models\RevolutionsSensor;
use App\Models\TemperatureSensor;
use App\Models\TemperatureSensorValue;
use Illuminate\Database\Eloquent\Builder;

class SensorService
{
    /**
     * @param array $period
     * @return TemperatureSensor|Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getTemperatureValues(array $period)
    {
        return TemperatureSensor::query()->with(['values' => function($query) use ($period) {
            $query->when(isset($period['date_start']), function (Builder $query) use ($period) {
                $query->where('date', '>=', $period['date_start']);
            })->when(isset($period['date_end']), function (Builder $query) use ($period) {
                $query->where('date', '<=', $period['date_end']);
            });
        }])->first();
    }

    /**
     * @param array $period
     * @return PressureSensor|Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getPressureValues(array $period)
    {
        return PressureSensor::query()->with(['values' => function($query) use ($period) {
            $query->when(isset($period['date_start']), function (Builder $query) use ($period) {
                $query->where('date', '>=', $period['date_start']);
            })->when(isset($period['date_end']), function (Builder $query) use ($period) {
                $query->where('date', '<=', $period['date_end']);
            });
        }])->first();
    }

    /**
     * @param array $period
     * @return RevolutionsSensor|Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getRevolutionsValues(array $period)
    {
        return RevolutionsSensor::query()->with(['values' => function($query) use ($period) {
            $query->when(isset($period['date_start']), function (Builder $query) use ($period) {
                $query->where('date', '>=', $period['date_start']);
            })->when(isset($period['date_end']), function (Builder $query) use ($period) {
                $query->where('date', '<=', $period['date_end']);
            });
        }])->first();
    }
}
