<?php

namespace Tests\Feature;

use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class AuthTest extends TestCase
{

    public function test_register()
    {
        $response = $this->createAdmin();

        $response->assertCreated();
    }

    public function test_login()
    {
        $this->createAdmin();
        $response = $this->post(
            '/api/auth/login',
            ['email' => 'admin@example.com', 'password' => '12345678']);

        $response->assertOk();
        $response->assertJsonStructure(['access_token']);
    }

    private function createAdmin(): TestResponse
    {
        return $this->post(
            '/api/auth/register',
            ['name' => 'admin', 'email' => 'admin@example.com', 'password' => '12345678']);

    }
}
