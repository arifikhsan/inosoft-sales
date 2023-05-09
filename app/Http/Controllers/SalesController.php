<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection|Sale[]
     */
    public function index()
    {
        if (request()->query->has('vehicle_id')) {
            return Sale::where(['vehicle_id' => request()->query->get('vehicle_id')])->get();
        }
        return Sale::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $vehicle = Vehicle::find($request->get('vehicle_id'));

        if ($request->get('quantity') > $vehicle->inventory->quantity) {
            return response()->json(['message' => 'Not enough in stock'], 422);
        }

        $saleParams = $request->only(['vehicle_id', 'price', 'quantity', 'customer_name']);
        $saleParams['total'] = $request->get('price') * $request->get('quantity');

        return response()->json(Sale::create($saleParams));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param Sale $sale
     * @return Response
     */
    public function destroy(Sale $sale): Response
    {
        $sale->delete();

        return response()->noContent();
    }
}
