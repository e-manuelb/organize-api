<?php

namespace Tests\Feature\User\User;

use App\Models\RoleTypes;
use Tests\TestCase;

class CreateUserControllerTest extends TestCase
{
    public function testCreateUser(): void
    {
        $response = $this->post('/api/user/create', [
            'name' => 'Username',
            'email' => 'user@email.com',
            'password' => '12345678',
            'role_id' => RoleTypes::USER
        ]);

        $response->assertStatus(201);
    }
}
