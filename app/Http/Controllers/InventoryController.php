<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection|Inventory[]
     */
    public function index()
    {
        return Inventory::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        if (Inventory::where(['vehicle_id' => $request->get('vehicle_id')])->exists()) {
            return response()->json(['message' => 'Inventory already exists'], 422);
        }

        $inventoryParams = $request->only(['vehicle_id', 'quantity']);

        return response()->json(Inventory::create($inventoryParams));
    }

    /**
     * Display the specified resource.
     *
     * @param Inventory $inventory
     * @return Inventory
     */
    public function show(Inventory $inventory): Inventory
    {
        return $inventory;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Inventory $inventory
     * @return Inventory
     */
    public function update(Request $request, Inventory $inventory): Inventory
    {
        if ($request->has('quantity')) {
            $inventory->quantity = $request->get('quantity');
        }

        $inventory->save();
        return $inventory;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Inventory $inventory
     * @return Response
     */
    public function destroy(Inventory $inventory): Response
    {
        $inventory->delete();

        return response()->noContent();
    }
}
