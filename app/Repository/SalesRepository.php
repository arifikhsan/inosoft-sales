<?php

namespace App\Repository;

use App\Models\Sale;

class SalesRepository
{
    public function getAll() {
        return Sale::all();
    }

    public function findWhereVehicleId(string $vehicleId) {
        return Sale::where(['vehicle_id' => $vehicleId])->get();
    }

    public function create($attributes) {
        return Sale::create($attributes);
    }

    public function delete(Sale $sale) {
        $sale->delete();
    }
}
