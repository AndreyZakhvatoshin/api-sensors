<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property int $sensor_id
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TemperatureSensorValueFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|TemperatureSensorValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TemperatureSensorValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TemperatureSensorValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|TemperatureSensorValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TemperatureSensorValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TemperatureSensorValue whereSensorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TemperatureSensorValue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TemperatureSensorValue whereValue($value)
 * @property-read \App\Models\TemperatureSensor $sensor
 */
class TemperatureSensorValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'value'
    ];

    public $timestamps = false;

    public function sensor()
    {
        return $this->belongsTo(TemperatureSensor::class, 'sensor_id', 'id');
    }
}
