<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

/**
 * @method static create(array $salesParams)
 * @method static where(array $array)
 * @property mixed $vehicle_id
 * @property mixed $price
 * @property mixed $quantity
 * @property mixed $total
 * @property mixed $customer_name
 */
class Sale extends Model
{
    use HasFactory;

    protected $collection = 'sales';

    protected $fillable = [
        'vehicle_id',
        'price',
        'quantity',
        'total',
        'customer_name'
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
