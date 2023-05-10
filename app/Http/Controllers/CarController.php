<?php

namespace App\Http\Controllers;

use App\Models\car;
use App\Service\CarService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarController extends Controller
{
    protected $carService;

    public function __construct(
        CarService $carService
    ) {
        $this->carService = $carService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Car[]|Collection
     */
    public function index()
    {
        return $this->carService->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return car
     */
    public function store(Request $request): Car
    {
        return $this->carService->create($request);
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
        return $this->carService->update($request, $car);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param car $car
     * @return Response
     */
    public function destroy(Car $car): Response
    {
        $this->carService->delete($car);

        return response()->noContent();
    }
}
