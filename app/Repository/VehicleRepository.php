<?php

namespace App\Repository;

use App\Models\Vehicle;

class VehicleRepository
{
    public function getAll()
    {
        return Vehicle::all();
    }

    public function getById(string $string)
    {
        return Vehicle::find($string);
    }

    public function create($attributes) {
        return Vehicle::create($attributes);
    }
}
