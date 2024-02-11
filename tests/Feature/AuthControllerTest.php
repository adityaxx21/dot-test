<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Mockery\Mock;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;
 
    public function test_user_login()
    {
        $user = User::factory()->create();
 
        $response = $this->post('/api/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
 
        $this->assertAuthenticated();
        $response->assertStatus(200);

    }

    public function test_user_fail_login()
    {
        $user = User::factory()->create();
 
        $this->post('/api/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);
 
        $this->assertGuest();
    }

    public function test_user_signup()
    {
        $response = $this->post('/api/signup', [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => 'password',
        ]);
        
        $response->assertStatus(200);
    }

    public function test_user_fail_signup()
    {
        $user = User::factory()->create();

        $response = $this->post('/api/signup', [
            'name' => fake()->name(),
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(422);
    }
 
}
