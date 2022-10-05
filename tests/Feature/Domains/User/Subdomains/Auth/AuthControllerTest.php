<?php

namespace Domains\User\Subdomains\Auth;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Response;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testLogin(): void
    {
        $user = $this->createUser();

        $response = $this->post('/api/auth/login', [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertJsonStructure([
            'data' => [
                'access_token'
            ]
        ]);

        $response->assertOk();
    }

    public function testLoginWithIncorrectCredentials(): void
    {
        $user = $this->createUser();

        $response = $this->post('/api/auth/login', [
            'email' => $user->email,
            'password' => '123'
        ]);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
