<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

/**
 * @method static create(array $inventoryParams)
 * @method static where(array $array)
 * @property mixed $quantity
 */
class Inventory extends Model
{
    use HasFactory;

    protected $collection = 'inventories';

    protected $fillable = [
        'vehicle_id',
        'quantity',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
