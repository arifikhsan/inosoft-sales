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
     * Display the specified resource.
     *
     * @param Vehicle $vehicle
     * @return Vehicle
     */
    public function show(Vehicle $vehicle): Vehicle
    {
        return $vehicle;
    }
}
