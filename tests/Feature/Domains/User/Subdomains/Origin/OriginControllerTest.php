<?php

namespace Domains\User\Subdomains\Origin;

use Illuminate\Http\Response;
use Tests\TestCase;

class OriginControllerTest extends TestCase
{
    public function testCreateOrigin(): void
    {
        $user = $this->createUser();

        $response = $this->actingAs($user)->post('/api/origin/', [
            'name' => 'Visa Infinite',
            'user_id' => $user->id
        ]);

        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function testCreateOriginWhenIsNotLoggedIn(): void
    {
        $user = $this->createUser();

        $response = $this->post('/api/origin/', [
            'name' => 'Visa Infinite',
            'user_id' => $user->id
        ]);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }
}
