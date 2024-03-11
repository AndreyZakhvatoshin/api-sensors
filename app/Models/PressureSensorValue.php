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
 * @method static \Database\Factories\PressureSensorValueFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PressureSensorValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PressureSensorValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PressureSensorValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|PressureSensorValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PressureSensorValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PressureSensorValue whereSensorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PressureSensorValue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PressureSensorValue whereValue($value)
 */
class PressureSensorValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'value'
    ];

    public $timestamps = false;
}
