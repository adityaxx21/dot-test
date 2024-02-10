<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegionControllerTest extends TestCase
{
    public function test_city_api_returns_a_successful_response()
    {
        // Assuming you have a User model and you want to authenticate as a specific user
        $user = User::factory()->create();

        // Assuming your API requires a token for authentication
        $token = $user->createToken('TestToken')->plainTextToken;

        // Acting as the user with the generated token
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('/api/search/city');

        // Asserting the expected status (assuming 200 for successful response)
        $response->assertStatus(200);
    }

    public function test_city_api_returns_a_failed_response()
    {
        $response = $this->get('/api/search/city');

        $response->assertStatus(400);
    }

    public function test_province_api_returns_a_successful_response()
    {
        // Assuming you have a User model and you want to authenticate as a specific user
        $user = User::factory()->create();

        // Assuming your API requires a token for authentication
        $token = $user->createToken('TestToken')->plainTextToken;

        // Acting as the user with the generated token
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('/api/search/province');

        // Asserting the expected status (assuming 200 for successful response)
        $response->assertStatus(200);
    }

    public function test_province_api_returns_a_failed_response()
    {
        $response = $this->get('/api/search/province');

        $response->assertStatus(400);
    }
}
