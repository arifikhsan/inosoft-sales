<?php

namespace App\Service;

use App\Models\Car;
use App\Repository\CarRepository;
use Illuminate\Http\Request;

class CarService
{
    protected $carRepository;

    public function __construct(
        CarRepository $carRepository
    ) {
        $this->carRepository = $carRepository;
    }

    public function getAll() {
        return $this->carRepository->getAll();
    }

    public function create(Request $request) {
        $carParams = $request->only(['engine', 'passenger_capacity', 'type']);
        $vehicleParams = $request->only(['production_year', 'color', 'price']);

        $car = $this->carRepository->create($carParams);
        $car->vehicle()->create($vehicleParams);

        return $car;
    }

    public function update(Request $request, Car $car): Car
    {
        if ($request->has('passenger_capacity')) {
            $car->passenger_capacity = $request->get('passenger_capacity');
        }

        if ($request->has('engine')) {
            $car->engine = $request->get('engine');
        }

        if ($request->has('type')) {
            $car->type = $request->get('type');
        }

        $car->save();

        $vehicle = $car->vehicle;

        if ($request->has('production_year')) {
            $vehicle->production_year = $request->get('production_year');
        }

        if ($request->has('color')) {
            $vehicle->color = $request->get('color');
        }

        if ($request->has('price')) {
            $vehicle->price = $request->get('price');
        }

        $vehicle->save();

        return $car;
    }

    public function delete(Car $car) {
        $car->vehicle->delete();
        $this->carRepository->delete($car);
    }
}
