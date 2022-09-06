<?php

namespace Domains\User\Subdomains\Origin;

use Tests\TestCase;

class CreateOriginControllerTest extends TestCase
{
    public function testCreateOrigin(): void
    {
        $user = $this->createUser();

        $response = $this->actingAs($user)->post('/api/origin/create', [
            'name' => 'Visa Infinite',
            'user_id' => $user->id
        ]);

        $response->assertStatus(201);
    }

    public function testCreateOriginWhenIsNotLoggedIn(): void
    {
        $user = $this->createUser();

        $response = $this->post('/api/origin/create', [
            'name' => 'Visa Infinite',
            'user_id' => $user->id
        ]);

        $response->assertStatus(401);
    }
}
