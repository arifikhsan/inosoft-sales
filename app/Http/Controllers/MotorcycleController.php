<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MotorcycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection|Motorcycle[]
     */
    public function index()
    {
        return Motorcycle::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Motorcycle
     */
    public function store(Request $request): Motorcycle
    {
        $motorcycleParams = $request->only(['engine', 'suspension_type', 'transmission_type']);
        $vehicleParams = $request->only(['production_year', 'color', 'price']);

        $motorcycle = Motorcycle::create($motorcycleParams);
        $motorcycle->vehicle()->create($vehicleParams);

        return $motorcycle;
    }

    /**
     * Display the specified resource.
     *
     * @param Motorcycle $motorcycle
     * @return Motorcycle
     */
    public function show(Motorcycle $motorcycle): Motorcycle
    {
        return $motorcycle;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Motorcycle $motorcycle
     * @return Motorcycle
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param Motorcycle $motorcycle
     * @return Response
     */
    public function destroy(Motorcycle $motorcycle): Response
    {
        $motorcycle->vehicle->delete();
        $motorcycle->delete();

        return response()->noContent();
    }
}
