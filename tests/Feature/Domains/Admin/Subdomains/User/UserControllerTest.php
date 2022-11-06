<?php

namespace Domains\Admin\Subdomains\User;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Response;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testCreateUser(): void
    {
        $admin = $this->createAdmin();

        $response = $this->actingAs($admin)
            ->post('api/admin/users/', [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'user@email.com',
                'password' => '12345678',
                'role_id' => Roles::USER
            ]);

        $response->assertStatus(Response::HTTP_CREATED);
    }

    public function testCreateUserWhenIsNotAdmin(): void
    {
        $response = $this->post('api/admin/users/', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'user@email.com',
            'password' => '12345678',
            'role_id' => Roles::USER
        ]);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testIndexUsers()
    {
        $admin = $this->createAdmin();

        $users = User::factory(15)->create();

        $users->push($admin);

        $response = $this->actingAs($admin)->get('api/admin/users/');

        $response->assertOk();

        $this->assertCount($users->count(), $response->json()['data']);
    }

    public function testIndexUsersWithFirstNameFilter()
    {
        $admin = $this->createAdmin();

        $firstName = 'John';

        $users = User::factory(5)->create([
            'first_name' => $firstName
        ]);

        $query = http_build_query([
            'first_name' => $firstName
        ]);

        $response = $this->actingAs($admin)->get("api/admin/users?$query");

        $response->assertOk();

        $this->assertCount($users->count(), $response->json()['data']);
    }

    public function testIndexUsersWithFirstNameFilterInArray()
    {
        $admin = $this->createAdmin();

        $firstNames = ['Trent', 'Howard'];

        $users = collect();

        foreach ($firstNames as $firstName) {
            for ($i = 0; $i < 5; $i++) {
                $users->push(User::factory()->create(['first_name' => $firstName]));
            }
        }

        $query = http_build_query([
            'first_name' => $firstNames
        ]);

        $response = $this->actingAs($admin)->get("api/admin/users?$query");

        $response->assertOk();

        $this->assertCount($users->count(), $response->json()['data']);
    }

    public function testIndexUsersWithMiddleNameFilter()
    {
        $admin = $this->createAdmin();

        $middleName = 'Stewart';

        $users = User::factory(5)->create([
            'middle_name' => $middleName
        ]);

        $query = http_build_query([
            'middle_name' => $middleName
        ]);

        $response = $this->actingAs($admin)->get("api/admin/users?$query");

        $response->assertOk();

        $this->assertCount($users->count(), $response->json()['data']);
    }

    public function testIndexUsersWithMiddleNameFilterInArray()
    {
        $admin = $this->createAdmin();

        $middleNames = ['Cavalcante', 'Johnson'];

        $users = collect();

        foreach ($middleNames as $middleName) {
            for ($i = 0; $i < 5; $i++) {
                $users->push(User::factory()->create(['middle_name' => $middleName]));
            }
        }

        $query = http_build_query([
            'middle_name' => $middleNames
        ]);

        $response = $this->actingAs($admin)->get("api/admin/users?$query");

        $response->assertOk();

        $this->assertCount($users->count(), $response->json()['data']);
    }

    public function testIndexUsersWithLastNameFilter()
    {
        $admin = $this->createAdmin();

        $lastName = 'Barros';

        $users = User::factory(5)->create([
            'last_name' => $lastName
        ]);

        $query = http_build_query([
            'last_name' => $lastName
        ]);

        $response = $this->actingAs($admin)->get("api/admin/users?$query");

        $response->assertOk();

        $this->assertCount($users->count(), $response->json()['data']);
    }

    public function testIndexUsersWithLastNameFilterInArray()
    {
        $admin = $this->createAdmin();

        $lastNames = ['Almeida', 'Viana'];

        $users = collect();

        foreach ($lastNames as $lastName) {
            for ($i = 0; $i < 5; $i++) {
                $users->push(User::factory()->create(['last_name' => $lastName]));
            }
        }

        $query = http_build_query([
            'last_name' => $lastNames
        ]);

        $response = $this->actingAs($admin)->get("api/admin/users?$query");

        $response->assertOk();

        $this->assertCount($users->count(), $response->json()['data']);
    }

    public function testIndexUsersWithEmailFilter()
    {
        $admin = $this->createAdmin();

        $emails = ['test@example.com', 'test@test.com', 'test@gov.com'];

        $users = collect();

        foreach ($emails as $email) {
            $users->push(User::factory()->create(['email' => $email]));
        }

        $query = http_build_query([
            'email' => $emails[0]
        ]);

        $response = $this->actingAs($admin)->get("api/admin/users?$query");

        $response->assertOk();

        $this->assertCount(1, $response->json()['data']);
    }

    public function testIndexUsersWithEmailFilterInArray()
    {
        $admin = $this->createAdmin();

        $emails = ['test@example.com.br', 'test@test.com.br', 'test@gov.com.br', 'test@laravel.com.br'];

        $users = collect();

        foreach ($emails as $email) {
            $users->push(User::factory()->create(['email' => $email]));
        }

        $query = http_build_query([
            'email' => $emails
        ]);

        $response = $this->actingAs($admin)->get("api/admin/users?$query");

        $response->assertOk();

        $this->assertCount($users->count(), $response->json()['data']);
    }

    public function testIndexUsersWithRoleIdFilter()
    {
        $admin = $this->createAdmin();

        $roleId = Roles::ADMIN;

        $users = User::factory(15)->create(['role_id' => $roleId]);

        $users->push($admin);

        $query = http_build_query([
            'role_id' => $roleId
        ]);

        $response = $this->actingAs($admin)->get("api/admin/users?$query");

        $response->assertOk();

        $this->assertCount($users->count(), $response->json()['data']);
    }

    public function testIndexUsersWithRoleIdFilterInArray()
    {
        $admin = $this->createAdmin();

        $roleIds = [Roles::ADMIN, Roles::USER];

        $users = collect();

        $users->push($admin);

        foreach ($roleIds as $roleId) {
            for ($i = 0; $i < 5; $i++) {
                $users->push(User::factory()->create(['role_id' => $roleId]));
            }
        }

        $query = http_build_query([
            'role_id' => $roleIds
        ]);

        $response = $this->actingAs($admin)->get("api/admin/users?$query");

        $response->assertOk();

        $this->assertCount($users->count(), $response->json()['data']);
    }

    public function testIndexUsersWhenIsNotAdmin()
    {
        $response = $this->get('api/admin/users/');

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testShowUser()
    {
        $user = $this->createUser();
        $admin = $this->createAdmin();

        $response = $this->actingAs($admin)->get("api/admin/users/$user->id");

        $response->assertOk();
    }

    public function testShowUserWhenIsNotAdmin()
    {
        $user = $this->createUser();

        $response = $this->get("api/admin/users/$user->id");

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testUpdateUser()
    {
        $admin = $this->createAdmin();
        $user = $this->createUser();

        $payload = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'fake@email.com',
            'password' => '123456789'
        ];

        $response = $this->actingAs($admin)->put("api/admin/users/$user->id", $payload);

        $response->assertJson([
            'data' => [
                'first_name' => $payload['first_name'],
                'last_name' => $payload['last_name'],
                'email' => $payload['email']
            ]
        ]);

        $response->assertOk();
    }

    public function testUpdateUserWhenIsNotAdmin()
    {
        $user = $this->createUser();

        $payload = [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'fake@email.com'
        ];

        $response = $this->put("api/admin/users/$user->id", $payload);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testDeleteUser()
    {
        $admin = $this->createAdmin();

        $user = $this->createUser();

        $response = $this->actingAs($admin)->delete("api/admin/users/$user->id");

        $response->assertJson([
            'message' => "User $user->id was deleted successfully."
        ]);

        $response->assertOk();
    }

    public function testDeleteUserWhenIsNotAdmin()
    {
        $user = $this->createUser();

        $response = $this->delete("api/admin/users/$user->id");

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }
}
