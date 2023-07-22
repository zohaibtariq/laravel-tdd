<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{

    use WithFaker;
    use RefreshDatabase;
    use DatabaseMigrations;

    public function test_a_user_can_login_with_correct_email_password(): void
    {
        $password = 'secret123';
        // generate random user
        $user = User::factory()->create([
            'password' => $password
        ]);
        $loginData = [
            'email' => $user->email,
            'password' => $password
        ];
        // now login that random user
        $response = $this->postJson(route('api.login'), $loginData)
            ->assertOk();
        $this->assertArrayHasKey('token', $response->json());
    }

    public function test_if_user_email_is_not_correct_then_it_returns_unauthorized_status_code(): void
    {
        $loginData = [
            'email' => $this->faker->email,// $user->email, //'email@email.com', // $this->faker->email,
            'password' => 'secret123'
        ];
        $this->postJson(route('api.login'), $loginData)
            ->assertUnauthorized();
    }

}
