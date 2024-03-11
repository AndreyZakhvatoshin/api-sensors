<?php

namespace App\Http\Resources;

use App\Models\TemperatureSensor;
use App\Models\TemperatureSensorValue;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin TemperatureSensor
 */
class SensorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'unit' => $this->unit,
            'values' => $this->values
        ];
    }
}
