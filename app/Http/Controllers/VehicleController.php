<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Repository\VehicleRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    protected $vehicleService;

    public function __construct(
        VehicleRepository $vehicleRepository
    )
    {
        $this->vehicleService = $vehicleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Collection|Vehicle[]
     */
    public function index()
    {
        return $this->vehicleService->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}
