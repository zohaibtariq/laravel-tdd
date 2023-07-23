<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Sanctum\Sanctum;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    function setUp(): void
    {
        parent::setUp();
    }

    function createUser($args = []){
        return User::factory()->create($args);
    }

    function createAuthUser(){
        $user = $this->createUser();
        return Sanctum::actingAs($user);
    }
}
