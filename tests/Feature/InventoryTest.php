<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;
use Throwable;

class InventoryTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->be(new User(['name' => 'admin']));
    }

    public function test_get_inventories()
    {
        $response = $this->get('/api/inventories');
        $response->assertOk();
    }

    /**
     * @throws Throwable
     */
    public function test_get_inventory()
    {
        $id = $this->createInventoryAndReturnId();
        $response = $this->get('/api/inventories/' . $id);
        $response->assertOk();
    }

    /**
     * @throws Throwable
     */
    public function test_create_inventory()
    {
        $response = $this->createInventory();
        $response->assertCreated();
    }

    /**
     * @throws Throwable
     */
    public function test_update_inventory()
    {
        $id = $this->createInventoryAndReturnId();

        $response = $this->patch('/api/inventories/' . $id, [
            'quantity' => 200]);

        $response->assertOk();

        $newCar = $this->get('/api/inventories/' . $id)->decodeResponseJson();
        self::assertEquals(200, $newCar['quantity']);
    }

    /**
     * @throws Throwable
     */
    public function test_delete_inventory()
    {
        $id = $this->createInventoryAndReturnId();

        $response = $this->delete('/api/inventories/' . $id);
        $response->assertNoContent();
    }

    /**
     * @throws Throwable
     */
    private function createInventory(): TestResponse
    {
        $id = $this->createVehicleAndReturnId();
        return $this->post('/api/inventories', [
            'vehicle_id' => $id,
            'quantity' => 100
        ]);
    }

    /**
     * @throws Throwable
     */
    private function createInventoryAndReturnId()
    {
        $response = $this->createInventory();
        return $response['_id'];
    }

    private function createVehicle(): void
    {
        $this->post('/api/cars', [
            'passenger_capacity' => 4,
            'engine' => 'big',
            'type' => 'suv',
            'production_year' => 2020,
            'color' => 'red',
            'price' => 10]);
    }

    /**
     * @throws Throwable
     */
    private function createVehicleAndReturnId()
    {
        $this->createVehicle();
        $response = $this->get('/api/vehicles')->decodeResponseJson();
        return $response[0]['_id'];
    }
}
