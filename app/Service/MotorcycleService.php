<?php

namespace App\Service;

use App\Models\Motorcycle;
use App\Repository\MotorcycleRepository;
use Illuminate\Http\Request;

class MotorcycleService
{
    protected $motorcycleRepository;

    public function __construct(
        MotorcycleRepository $motorcycleRepository
    )
    {
        $this->motorcycleRepository = $motorcycleRepository;
    }

    public function getAll()
    {
        return $this->motorcycleRepository->getAll();
    }

    public function create(Request $request)
    {
        $motorcycleParams = $request->only(['engine', 'suspension_type', 'transmission_type']);
        $vehicleParams = $request->only(['production_year', 'color', 'price']);

        $motorcycle = Motorcycle::create($motorcycleParams);
        $motorcycle->vehicle()->create($vehicleParams);

        return $motorcycle;
    }

    public function update(Request $request, Motorcycle $motorcycle): Motorcycle
    {
        if ($request->has('engine')) {
            $motorcycle->engine = $request->get('engine');
        }

        if ($request->has('suspension_type')) {
            $motorcycle->suspension_type = $request->get('suspension_type');
        }

        if ($request->has('transmission_type')) {
            $motorcycle->transmission_type = $request->get('transmission_type');
        }

        $motorcycle->save();

        $vehicle = $motorcycle->vehicle;

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

        return $motorcycle;
    }

    public function delete(Motorcycle $motorcycle)
    {
        $motorcycle->vehicle->delete();
        $motorcycle->delete();
    }
}
