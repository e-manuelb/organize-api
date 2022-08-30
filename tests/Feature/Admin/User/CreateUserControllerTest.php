<?php

namespace Tests\Feature\Admin\User;

use App\Models\RoleTypes;
use Tests\TestCase;

class CreateUserControllerTest extends TestCase
{
    public function testCreateUser(): void
    {
        $admin = $this->createAdmin();

        $response = $this->actingAs($admin)
            ->post('/api/admin/user/create', [
                'name' => 'Username',
                'email' => 'user@email.com',
                'password' => '12345678',
                'role_id' => RoleTypes::USER
            ]);

        $response->assertStatus(201);
    }

    public function testCreateUserWhenIsNotAdmin(): void
    {
        $response = $this->post('/api/admin/user/create', [
            'name' => 'Username',
            'email' => 'user@email.com',
            'password' => '12345678',
            'role_id' => RoleTypes::USER
        ]);

        $response->assertStatus(401);
    }
}
