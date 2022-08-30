<?php

namespace Admin\User;

use Tests\TestCase;

class ListUsersControllerTest extends TestCase
{
    public function testListUsers()
    {
        $admin = $this->createAdmin();

        $response = $this->actingAs($admin)->get('api/admin/user/');

        $response->assertStatus(200);
    }

    public function testListUsersWhenIsNotAdmin()
    {
        $response = $this->get('api/admin/user/');

        $response->assertStatus(401);
    }
}
