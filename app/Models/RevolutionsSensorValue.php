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
 * @method static \Database\Factories\RevolutionsSensorValueFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|RevolutionsSensorValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RevolutionsSensorValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RevolutionsSensorValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|RevolutionsSensorValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RevolutionsSensorValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RevolutionsSensorValue whereSensorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RevolutionsSensorValue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RevolutionsSensorValue whereValue($value)
 */
class RevolutionsSensorValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'value'
    ];

    public $timestamps = false;
}
