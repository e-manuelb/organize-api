<?php

namespace Domains\User\Subdomains\Wallet;

use Tests\TestCase;

class WalletControllerTest extends TestCase
{
    public function testCreateWallet(): void
    {
        $user = $this->createUser();

        $response = $this->actingAs($user)->post('/api/wallet/', [
            'name' => 'Salary',
            'user_id' => $user->id
        ]);

        $response->assertStatus(201);
    }

    public function testCreateWalletWhenIsNotLoggedIn(): void
    {
        $user = $this->createUser();

        $response = $this->post('/api/wallet/', [
            'name' => 'Salary',
            'user_id' => $user->id
        ]);

        $response->assertStatus(401);
    }

}
