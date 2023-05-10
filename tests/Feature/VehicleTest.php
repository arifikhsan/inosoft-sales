<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Throwable;

class VehicleTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->be(new User(['name' => 'admin']));
    }

    public function test_get_vehicles()
    {
        $response = $this->get('/api/vehicles');
        $response->assertOk();
    }

    /**
     * @throws Throwable
     */
    public function test_get_vehicle()
    {
        $id = $this->createVehicleAndReturnId();

        $response = $this->get('/api/vehicles/' . $id);
        $response->assertOk();
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
    private function createVehicleAndReturnId() {
        $this->createVehicle();
        $response = $this->get('/api/vehicles')->decodeResponseJson();
        return $response[0]['_id'];
    }
}
