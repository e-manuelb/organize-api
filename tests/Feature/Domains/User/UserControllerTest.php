<?php

namespace Domains\User;

use App\Models\Roles;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testCreateUser(): void
    {
        $response = $this->post('/api/user/', [
            'name' => 'Username',
            'email' => 'user@email.com',
            'password' => '12345678',
            'role_id' => Roles::USER
        ]);

        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function testUpdateUser()
    {
        $user = $this->createUser();

        $payload = [
            'name' => 'Fake name',
            'email' => 'fake@email.com'
        ];

        $response = $this->actingAs($user)->put("/api/user/$user->id", $payload);

        $response->assertJson([
            'data' => [
                'name' => 'Fake name',
                'email' => 'fake@email.com'
            ]
        ]);

        $response->assertOk();
    }
}
