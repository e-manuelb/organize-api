<?php

namespace Tests;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    public function createUser(): User
    {
        return User::factory()->create([
            'role_id' => Roles::USER
        ]);
    }

    public function createAdmin(): User
    {
        return User::factory()->create([
            'role_id' => Roles::ADMIN
        ]);
    }
}
