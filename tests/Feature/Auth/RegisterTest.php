<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     */
    public function test_a_user_can_register(): void
    {
        $userData = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
        ];
        $this->postJson(route('api.register'), array_merge($userData, [
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
        ]))
            ->assertCreated();
        $this->assertDatabaseHas((new User())->getTable(), $userData);
    }
}
