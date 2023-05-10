<?php

namespace App\Http\Controllers;

use App\Models\Motorcycle;
use App\Service\MotorcycleService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MotorcycleController extends Controller
{
    protected $motorcycleService;

    public function __construct(
        MotorcycleService $motorcycleService
    ) {
        $this->motorcycleService = $motorcycleService;
    }

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
        return $this->motorcycleService->create($request);
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
        return $this->motorcycleService->update($request, $motorcycle);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Motorcycle $motorcycle
     * @return Response
     */
    public function destroy(Motorcycle $motorcycle): Response
    {
        $this->motorcycleService->delete($motorcycle);

        return response()->noContent();
    }
}
