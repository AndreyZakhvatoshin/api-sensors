<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @property int $id
 * @property string $name
 * @property string $unit
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TemperatureSensorFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|TemperatureSensor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TemperatureSensor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TemperatureSensor query()
 * @method static \Illuminate\Database\Eloquent\Builder|TemperatureSensor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TemperatureSensor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TemperatureSensor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TemperatureSensor whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TemperatureSensor whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TemperatureSensorValue> $values
 * @property-read int|null $values_count
 */
class TemperatureSensor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function values()
    {
        return $this->hasMany(TemperatureSensorValue::class, 'sensor_id', 'id');
    }
}
