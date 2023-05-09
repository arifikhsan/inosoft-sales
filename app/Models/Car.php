<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Jenssegers\Mongodb\Eloquent\Model;

/**
 * @property mixed $passenger_capacity
 * @property mixed $engine
 * @property mixed $type
 * @property mixed $id
 * @property mixed $vehicle
 * @method static create(array $param)
 */
class Car extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */

    protected $collection = 'cars';

    protected $fillable = [
        'engine',
        'passenger_capacity',
        'type'
    ];

    public function vehicle(): MorphOne
    {
        return $this->morphOne('App\Models\Vehicle', 'vehicleable');
    }
}
