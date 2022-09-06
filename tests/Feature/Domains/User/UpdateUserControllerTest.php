<?php

namespace Domains\User;

use Tests\TestCase;

class UpdateUserControllerTest extends TestCase
{
    public function testUpdateUserController()
    {
        $user = $this->createUser();

        $payload = [
            'name' => 'Fake name',
            'email' => 'fake@email.com'
        ];

        $response = $this->actingAs($user)->put("/api/user/update/$user->id", $payload);

        $response->assertJson([
            'data' => [
                'name' => 'Fake name',
                'email' => 'fake@email.com'
            ]
        ]);

        $response->assertStatus(200);
    }
}
