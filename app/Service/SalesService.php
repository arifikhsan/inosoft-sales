<?php

namespace App\Service;
use App\Models\Sale;
use App\Repository\InventoryRepository;
use App\Repository\SalesRepository;
use App\Repository\VehicleRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SalesService
{
    protected $salesRepository;
    protected $vehicleRepository;

    public function __construct(
        SalesRepository $salesRepository,
        VehicleRepository $vehicleRepository
    )
    {
        $this->salesRepository = $salesRepository;
        $this->vehicleRepository = $vehicleRepository;
    }

    public function getAll(Request $request)
    {
        if ($request->query->has('vehicle_id')) {
            return $this->salesRepository->findWhereVehicleId('vehicle_id');
        }

        return $this->salesRepository->getAll();
    }

    public function create(Request $request): JsonResponse
    {
        $vehicle = $this->vehicleRepository->getById($request->get('vehicle_id'));

        if ($request->get('quantity') > $vehicle->inventory->quantity) {
            return response()->json(['message' => 'Not enough in stock'], 422);
        }

        $saleParams = $request->only(['vehicle_id', 'price', 'quantity', 'customer_name']);
        $saleParams['total'] = $request->get('price') * $request->get('quantity');

        $newQuantity = $vehicle->inventory->quantity - $request->get('quantity');
        $vehicle->inventory()->update(['quantity' => $newQuantity]);

        return response()->json($this->salesRepository->create($saleParams), 201);
    }

    public function update(Request $request, Sale $sale): Sale
    {
        if ($request->has('vehicle_id')) {
            $sale->vehicle_id = $request->get('vehicle_id');
        }

        if ($request->has('price')) {
            $sale->price = $request->get('price');
        }

        if ($request->has('quantity')) {
            $sale->quantity = $request->get('quantity');
        }

        if ($request->has('total')) {
            $sale->total = $request->get('total');
        }

        if ($request->has('customer_name')) {
            $sale->customer_name = $request->get('customer_name');
        }

        $sale->save();
        return $sale;
    }

    public function delete(Sale $sale) {
        $sale->delete();
    }
}
