<?php

namespace Domains\Admin\Subdomains\User;

use App\Models\Roles;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testCreateUser(): void
    {
        $admin = $this->createAdmin();

        $response = $this->actingAs($admin)
            ->post('/api/admin/user/', [
                'name' => 'Username',
                'email' => 'user@email.com',
                'password' => '12345678',
                'role_id' => Roles::USER
            ]);

        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function testCreateUserWhenIsNotAdmin(): void
    {
        $response = $this->post('/api/admin/user/', [
            'name' => 'Username',
            'email' => 'user@email.com',
            'password' => '12345678',
            'role_id' => Roles::USER
        ]);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testIndexUsers()
    {
        $admin = $this->createAdmin();

        $response = $this->actingAs($admin)->get('api/admin/user/');

        $response->assertOk();
    }

    public function testIndexUsersWhenIsNotAdmin()
    {
        $response = $this->get('api/admin/user/');

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testShowUser()
    {
        $user = $this->createUser();
        $admin = $this->createAdmin();

        $response = $this->actingAs($admin)->get("api/admin/user/$user->id");

        $response->assertOk();
    }

    public function testShowUserWhenIsNotAdmin()
    {
        $user = $this->createUser();

        $response = $this->get("api/admin/user/$user->id");

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testUpdateUser()
    {
        $admin = $this->createAdmin();
        $user = $this->createUser();

        $payload = [
            'name' => 'Fake name',
            'email' => 'fake@email.com',
            'password' => '123456789'
        ];

        $response = $this->actingAs($admin)->put("/api/admin/user/$user->id", $payload);

        $response->assertJson([
            'data' => [
                'name' => 'Fake name',
                'email' => 'fake@email.com'
            ]
        ]);

        $response->assertOk();
    }

    public function testUpdateUserWhenIsNotAdmin()
    {
        $user = $this->createUser();

        $payload = [
            'name' => 'Fake name',
            'email' => 'fake@email.com'
        ];

        $response = $this->put("/api/admin/user/$user->id", $payload);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testDeleteUser()
    {
        $admin = $this->createAdmin();

        $user = $this->createUser();

        $response = $this->actingAs($admin)->delete("/api/admin/user/$user->id");

        $response->assertJson([
            'message' => "User $user->id was deleted successfully."
        ]);

        $response->assertOk();
    }

    public function testDeleteUserWhenIsNotAdmin()
    {
        $user = $this->createUser();

        $response = $this->delete("/api/admin/user/$user->id");

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }
}
