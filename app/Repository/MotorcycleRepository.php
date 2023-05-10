<?php

namespace App\Repository;

use App\Models\Motorcycle;

class MotorcycleRepository
{
    public function getAll() {
        return Motorcycle::all();
    }

    public function create($attributes) {
        return Motorcycle::create($attributes);
    }

    public function delete(Motorcycle $motorcycle) {
        $motorcycle->delete();
    }
}
