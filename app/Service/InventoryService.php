<?php

namespace App\Service;

use App\Models\Inventory;
use App\Repository\InventoryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InventoryService
{
    protected $inventoryRepository;

    public function __construct(
        InventoryRepository $inventoryRepository
    )
    {
        $this->inventoryRepository = $inventoryRepository;
    }

    public function getAll()
    {
        return $this->inventoryRepository->getAll();
    }

    public function create(Request $request): JsonResponse
    {
        if (Inventory::where(['vehicle_id' => $request->get('vehicle_id')])->exists()) {
            return response()->json(['message' => 'Inventory already exists'], 422);
        }

        $inventoryParams = $request->only(['vehicle_id', 'quantity']);

        return response()->json(Inventory::create($inventoryParams));
    }

    public function update(Request $request, Inventory $inventory): Inventory
    {
        if ($request->has('quantity')) {
            $inventory->quantity = $request->get('quantity');
        }

        $inventory->save();
        return $inventory;
    }

    public function delete(Inventory $inventory)
    {
        $inventory->delete();
    }
}
