<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

/**
 * @method static find(mixed $get)
 */
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

    public function inventory() {
        return $this->hasOne(Inventory::class);
    }
}
