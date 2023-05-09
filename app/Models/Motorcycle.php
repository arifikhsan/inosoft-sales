<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Jenssegers\Mongodb\Eloquent\Model;

/**
 * @method static create(array $motorcycleParams)
 * @property mixed $vehicle
 * @property mixed $id
 * @property mixed $engine
 * @property mixed $suspension_type
 * @property mixed $transmission_type
 */
class Motorcycle extends Model
{
    use HasFactory;

    protected $collection = 'motorcycles';

    protected $fillable = [
        'engine',
        'suspension_type',
        'transmission_type'
    ];

    public function vehicle(): MorphOne
    {
        return $this->morphOne('App\Models\Vehicle', 'vehicleable');
    }
}
