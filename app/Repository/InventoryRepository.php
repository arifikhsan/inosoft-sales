<?php

namespace App\Repository;

use App\Models\Inventory;

class InventoryRepository
{
    public function getAll() {
        return Inventory::all();
    }

    public function create($attributes) {
        return Inventory::create($attributes);
    }

    public function delete(Inventory $inventory) {
        $inventory->delete();
    }
}
