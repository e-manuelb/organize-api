<?php

namespace Tests\Feature\Wallet;

use Tests\TestCase;

class CreateWalletControllerTest extends TestCase
{
    public function testCreateWallet(): void
    {
        $user = $this->createUser();

        $response = $this->actingAs($user)->post('/api/wallet/create', [
            'name' => 'Salary',
            'user_id' => $user->id
        ]);

        $response->assertStatus(201);
    }

    public function testCreateWalletWhenIsNotLoggedIn(): void
    {
        $user = $this->createUser();

        $response = $this->post('/api/wallet/create', [
            'name' => 'Salary',
            'user_id' => $user->id
        ]);

        $response->assertStatus(401);
    }

}
