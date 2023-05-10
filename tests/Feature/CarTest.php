<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;
use Throwable;

class CarTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->be(new User(['name' => 'admin']));
    }

    public function test_get_cars()
    {
        $response = $this->get('/api/cars');
        $response->assertOk();
    }

    /**
     * @throws Throwable
     */
    public function test_get_car()
    {
        $id = $this->createCarAndReturnId();

        $response = $this->get('/api/cars/' . $id);
        $response->assertOk();
    }

    public function test_create_car()
    {
        $response = $this->createCar();
        $response->assertCreated();
    }

    /**
     * @throws Throwable
     */
    public function test_update_car()
    {
        $id = $this->createCarAndReturnId();

        $response = $this->patch('/api/cars/' . $id, [
            'passenger_capacity' => 2,
            'engine' => 'small',
            'type' => 'carry',
            'production_year' => 2021,
            'color' => 'green',
            'price' => 20]);

        $response->assertOk();

        $newCar = $this->get('/api/cars/' . $id)->decodeResponseJson();
        self::assertEquals('carry', $newCar['type']);
    }

    /**
     * @throws Throwable
     */
    public function test_delete_car()
    {
        $id = $this->createCarAndReturnId();

        $response = $this->delete('/api/cars/' . $id);
        $response->assertNoContent();
    }

    private function createCar(): TestResponse
    {
        return $this->post('/api/cars', [
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
    private function createCarAndReturnId() {
        $car = $this->createCar()->decodeResponseJson();
        return $car['_id'];
    }
}
