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
 * @method static \Database\Factories\RevolutionsSensorFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|RevolutionsSensor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RevolutionsSensor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RevolutionsSensor query()
 * @method static \Illuminate\Database\Eloquent\Builder|RevolutionsSensor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RevolutionsSensor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RevolutionsSensor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RevolutionsSensor whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RevolutionsSensor whereUpdatedAt($value)
 */
class RevolutionsSensor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit'
    ];

    public function values()
    {
        return $this->hasMany(RevolutionsSensorValue::class, 'sensor_id', 'id');
    }
}
