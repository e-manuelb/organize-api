<?php

namespace Domains\User;

use App\Models\Roles;
use Tests\TestCase;

class CreateUserControllerTest extends TestCase
{
    public function testCreateUser(): void
    {
        $response = $this->post('/api/user/create', [
            'name' => 'Username',
            'email' => 'user@email.com',
            'password' => '12345678',
            'role_id' => Roles::USER
        ]);

        $response->assertStatus(201);
    }
}
