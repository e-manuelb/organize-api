<?php

namespace Tests;

use App\Models\RoleTypes;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function createUser(): User
    {
        return User::factory()->create([
            'role_id' => RoleTypes::USER
        ]);
    }
}
