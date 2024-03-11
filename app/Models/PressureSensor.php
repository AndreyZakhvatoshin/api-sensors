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
 * @method static \Database\Factories\PressureSensorFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PressureSensor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PressureSensor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PressureSensor query()
 * @method static \Illuminate\Database\Eloquent\Builder|PressureSensor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PressureSensor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PressureSensor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PressureSensor whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PressureSensor whereUpdatedAt($value)
 */
class PressureSensor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit'
    ];

    public function values()
    {
        return $this->hasMany(PressureSensorValue::class, 'sensor_id', 'id');
    }
}
