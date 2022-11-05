<?php

namespace Domains\User\Subdomains\Auth;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate', ['-vvv' => true]);
        $this->artisan('passport:install', ['-vvv' => true]);
        $this->artisan('db:seed',['-vvv' => true]);
    }

    public function testLogin(): void
    {
        $user = User::factory()->create([
            'role_id' => Roles::USER,
            'password' => Hash::make('password')
        ]);

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
