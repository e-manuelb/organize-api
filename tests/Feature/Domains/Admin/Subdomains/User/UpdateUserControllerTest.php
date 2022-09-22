<?php

namespace Domains\Admin\Subdomains\User;

use Tests\TestCase;

class UpdateUserControllerTest extends TestCase
{
    public function testUpdateUser()
    {
        $admin = $this->createAdmin();
        $user = $this->createUser();

        $payload = [
            'name' => 'Fake name',
            'email' => 'fake@email.com',
            'password' => '123456789'
        ];

        $response = $this->actingAs($admin)->put("/api/admin/user/update/$user->id", $payload);

        $response->assertJson([
            'data' => [
                'name' => 'Fake name',
                'email' => 'fake@email.com'
            ]
        ]);

        $response->assertStatus(200);
    }

    public function testUpdateUserWhenIsNotAdmin()
    {
        $user = $this->createUser();

        $payload = [
            'name' => 'Fake name',
            'email' => 'fake@email.com'
        ];

        $response = $this->put("/api/admin/user/update/$user->id", $payload);

        $response->assertStatus(401);
    }
}
