<?php

namespace App\Http\Controllers;

use App\Models\car;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Car[]|Collection
     */
    public function index()
    {
        return Car::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return car
     */
    public function store(Request $request): Car
    {

        $carParams = $request->only(['engine', 'passenger_capacity', 'type']);
        $vehicleParams = $request->only(['production_year', 'color', 'price']);

        $car = Car::create($carParams);
        $car->vehicle()->create($vehicleParams);

        return $car;
    }

    /**
     * Display the specified resource.
     *
     * @param Car $car
     * @return Car
     */
    public function show(Car $car): Car
    {
        return $car;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Car $car
     * @return Car
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param car $car
     * @return Response
     */
    public function destroy(Car $car): Response
    {
        $car->vehicle->delete();
        $car->delete();

        return response()->noContent();
    }
}
