<?php

namespace Domains\User\Subdomains\Purchase;

use App\Models\Origin;
use App\Models\Wallet;
use Tests\TestCase;

class CreatePurchaseControllerTest extends TestCase
{
    public function testCreatePurchaseThatHasInstallments(): void
    {
        $user = $this->createUser();
        $wallet = Wallet::factory()->create([
            'user_id' => $user->id
        ]);
        $origin = Origin::factory()->create([
            'user_id' => $user->id
        ]);

        $purchase = [
            'description' => 'Gamer Keyboard',
            'store_name' => 'Amazon',
            'store_id' => '1',
            'date' => now(),
            'origin_id' => $origin->id,
            'wallet_id' => $wallet->id,
            'value' => 782.98,
            'is_installments' => 1,
            'installments_number' => 12,
            'user_id' => $user->id
        ];

        $response = $this->actingAs($user)->post('/api/purchase/create', $purchase);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'description',
                'store_name',
                'store_id',
                'date',
                'origin_id',
                'wallet_id',
                'value',
                'is_installments',
                'installments_number',
                'user_id',
                'updated_at',
                'created_at'
            ]
        ]);
        $response->assertStatus(201);

    }

    public function testCreatePurchaseThatHasNotInstallments(): void
    {
        $user = $this->createUser();
        $wallet = Wallet::factory()->create([
            'user_id' => $user->id
        ]);
        $origin = Origin::factory()->create([
            'user_id' => $user->id
        ]);

        $purchase = [
            'description' => 'Gamer Keyboard',
            'store_name' => 'Amazon',
            'store_id' => '1',
            'date' => now(),
            'origin_id' => $origin->id,
            'wallet_id' => $wallet->id,
            'value' => 500,
            'is_installments' => 0,
            'user_id' => $user->id
        ];

        $response = $this->actingAs($user)->post('/api/purchase/create', $purchase);

        $response->assertJsonStructure([
            'data' => [
                'id',
                'description',
                'store_name',
                'store_id',
                'date',
                'origin_id',
                'wallet_id',
                'value',
                'user_id',
                'updated_at',
                'created_at'
            ]
        ]);

        $response->assertStatus(201);

    }

    public function testCreatePurchaseWhenIsNotLoggedIn(): void
    {
        $user = $this->createUser();
        $wallet = Wallet::factory()->create([
            'user_id' => $user->id
        ]);
        $origin = Origin::factory()->create([
            'user_id' => $user->id
        ]);

        $purchase = [
            'description' => 'Gamer Keyboard',
            'store_name' => 'Amazon',
            'store_id' => '1',
            'date' => now(),
            'origin_id' => $origin->id,
            'wallet_id' => $wallet->id,
            'value' => 500,
            'is_installments' => 0,
            'user_id' => $user->id
        ];

        $response = $this->post('/api/purchase/create', $purchase);

        $response->assertStatus(401);
    }

}
