<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;
use Throwable;
use function PHPUnit\Framework\assertEquals;

class SalesTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->be(new User(['name' => 'admin']));
    }

    public function test_get_sales()
    {
        $response = $this->get('/api/sales');
        $response->assertOk();
    }

    /**
     * @throws Throwable
     */
    public function test_get_sale()
    {
        $id = $this->createSaleAndReturnId();

        $response = $this->get('/api/sales/' . $id);
        $response->assertOk();
    }

    /**
     * @throws Throwable
     */
    public function test_create_sale()
    {
        $response = $this->createSale();
        $response->assertCreated();

        $response = $this->get('/api/inventories')->decodeResponseJson();
        $quantityLeft = $response[0]['quantity'];

        self::assertEquals(98, $quantityLeft);
    }

    /**
     * @throws Throwable
     */
    public function test_update_sale()
    {
        $id = $this->createSaleAndReturnId();
        $response = $this->patch('/api/sales/' . $id, [
            'quantity' => 999
        ]);

        $response->assertOk();

        $newSale = $this->get('/api/sales/' . $id)->decodeResponseJson();
        assertEquals(999, $newSale['quantity']);
    }

    /**
     * @throws Throwable
     */
    public function test_delete_sale()
    {
        $id = $this->createSaleAndReturnId();

        $response = $this->delete('/api/sales/' . $id);
        $response->assertNoContent();
    }

    /**
     * @throws Throwable
     */
    private function createSale(): TestResponse
    {
        $vehicleId = $this->createVehicleAndReturnId();

        $this->post('/api/inventories', [
            'vehicle_id' => $vehicleId,
            'quantity' => 100
        ]);

        return $this->post('/api/sales', [
            'vehicle_id' => $vehicleId,
            'quantity' => 2,
            'price' => 100,
            'customer_name' => 'slamet'
        ]);
    }

    /**
     * @throws Throwable
     */
    private function createSaleAndReturnId()
    {
        $sale = $this->createSale()->decodeResponseJson();
        return $sale['_id'];
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
