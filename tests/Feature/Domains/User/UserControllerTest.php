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
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'user@email.com',
            'password' => '12345678',
        ]);

        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function testUpdateUser()
    {
        $user = $this->createUser();

        $payload = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'fake@email.com'
        ];

        $response = $this->actingAs($user)->put("/api/user/$user->id", $payload);

        $response->assertJson([
            'data' => [
                'first_name' => $payload['first_name'],
                'last_name' => $payload['last_name'],
                'email' => $payload['email']
            ]
        ]);

        $response->assertOk();
    }
}
