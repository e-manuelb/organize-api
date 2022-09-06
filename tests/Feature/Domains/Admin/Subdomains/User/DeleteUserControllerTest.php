<?php

namespace Domains\Admin\Subdomains\User;

use Tests\TestCase;

class DeleteUserControllerTest extends TestCase
{
    public function testDeleteUser()
    {
        $admin = $this->createAdmin();

        $user = $this->createUser();

        $response = $this->actingAs($admin)->delete("/api/admin/user/delete/$user->id");

        $response->assertJson([
            'message' => "User $user->id was deleted successfully."
        ]);

        $response->assertStatus(200);
    }

    public function testDeleteUserWhenIsNotAdmin()
    {
        $user = $this->createUser();

        $response = $this->delete("/api/admin/user/delete/$user->id");

        $response->assertStatus(401);
    }
}
