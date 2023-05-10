<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Service\InventoryService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InventoryController extends Controller
{
    protected $inventoryService;

    public function __construct(
        InventoryService $inventoryService
    )
    {
        $this->inventoryService = $inventoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Collection|Inventory[]
     */
    public function index()
    {
        return $this->inventoryService->getAll();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        return $this->inventoryService->create($request);
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
        return $this->inventoryService->update($request, $inventory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Inventory $inventory
     * @return Response
     */
    public function destroy(Inventory $inventory): Response
    {
        $this->inventoryService->delete($inventory);

        return response()->noContent();
    }
}
