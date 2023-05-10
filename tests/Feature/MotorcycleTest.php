<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;
use Throwable;

class MotorcycleTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->be(new User(['name' => 'admin']));
    }

    public function test_get_motorcycles()
    {
        $response = $this->get('/api/motorcycles');

        $response->assertOk();
    }

    /**
     * @throws Throwable
     */
    public function test_get_motorcycle()
    {
        $id = $this->createMotorcycleAndReturnId();
        $response = $this->get('/api/motorcycles/' . $id);

        $response->assertOk();
    }

    public function test_create_motorcycle()
    {
        $response = $this->createMotorcycle();
        $response->assertCreated();
    }

    /**
     * @throws Throwable
     */
    public function test_update_motorcycle()
    {
        $id = $this->createMotorcycleAndReturnId();

        $response = $this->patch('/api/motorcycles/' . $id, [
            'suspension_type' => 'nice',
            'engine' => 'medium',
            'transmission_type' => 'auto',
            'production_year' => 2023,
            'color' => 'yellow',
            'price' => 20]);

        $response->assertOk();

        $newCar = $this->get('/api/motorcycles/' . $id)->decodeResponseJson();
        self::assertEquals('nice', $newCar['suspension_type']);
    }

    /**
     * @throws Throwable
     */
    public function test_delete_motorcycle()
    {
        $id = $this->createMotorcycleAndReturnId();

        $response = $this->delete('/api/motorcycles/' . $id);
        $response->assertNoContent();
    }

    private function createMotorcycle(): TestResponse
    {
        return $this->post('/api/motorcycles', [
            'suspension_type' => 'good',
            'engine' => 'small',
            'transmission_type' => 'kopling',
            'production_year' => 2020,
            'color' => 'red',
            'price' => 10]);
    }

    /**
     * @throws Throwable
     */
    private function createMotorcycleAndReturnId()
    {
        $motorcycle = $this->createMotorcycle()->decodeResponseJson();
        return $motorcycle['_id'];
    }
}
