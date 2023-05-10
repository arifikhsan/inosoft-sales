<?php

namespace App\Repository;

use App\Models\Car;

class CarRepository
{
    public function getAll() {
        return Car::all();
    }

    public function create($attributes) {
        return Car::create($attributes);
    }

    public function delete(Car $car) {
        $car->delete();
    }
}
