<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Service\SalesService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SalesController extends Controller
{
    protected $salesService;

    public function __construct(
        SalesService $salesService
    )
    {
        $this->salesService = $salesService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Collection|Sale[]
     */
    public function index()
    {
        return $this->salesService->getAll(request());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        return $this->salesService->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param Sale $sale
     * @return Sale
     */
    public function show(Sale $sale): Sale
    {
        return $sale;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Sale $sale
     * @return Sale
     */
    public function update(Request $request, Sale $sale): Sale
    {
        return $this->salesService->update($request, $sale);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Sale $sale
     * @return Response
     */
    public function destroy(Sale $sale): Response
    {
        $this->salesService->delete($sale);

        return response()->noContent();
    }
}
