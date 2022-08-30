<?php

namespace Tests\Feature\User\Auth\Login;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class LoginControllerTest extends TestCase
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

        $response->assertStatus(200);
    }

    public function testLoginWithIncorrectCredentials(): void
    {
        $user = $this->createUser();

        $response = $this->post('/api/auth/login', [
            'email' => $user->email,
            'password' => '123'
        ]);

        $response->assertStatus(422);
    }
}