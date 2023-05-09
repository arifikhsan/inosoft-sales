<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $collection = 'vehicles';

    protected $fillable = [
        'vehicleable_id',
        'vehicleable_type',
        'production_year',
        'color',
        'price'
    ];

    public function vehicleable() {
        return $this->morphTo();
    }
}
