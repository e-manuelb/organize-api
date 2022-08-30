<?php

namespace Tests\Feature\User\Purchase;

use App\Models\Origin;
use App\Models\Purchase;
use App\Models\Wallet;
use Tests\TestCase;

class ListPurchasesControllerTest extends TestCase
{
    public function testListPurchases(): void
    {
        $user = $this->createUser();
        $wallet = Wallet::factory()->create([
            'user_id' => $user->id
        ]);
        $origin = Origin::factory()->create([
            'user_id' => $user->id
        ]);

        Purchase::factory()->count(20)->create([
            'origin_id' => $origin->id,
            'wallet_id' => $wallet->id,
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->get('/api/purchase/list');

        $response->assertJsonStructure([
            'data' => [
                '*' => [
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
            ]
        ]);

        $response->assertStatus(200);
    }

    public function testListPurchasesWhenIsNotLoggedIn(): void
    {
        $user = $this->createUser();
        $wallet = Wallet::factory()->create([
            'user_id' => $user->id
        ]);
        $origin = Origin::factory()->create([
            'user_id' => $user->id
        ]);

        Purchase::factory()->count(20)->create([
            'origin_id' => $origin->id,
            'wallet_id' => $wallet->id,
            'user_id' => $user->id
        ]);

        $response = $this->get('/api/purchase/list');

        $response->assertStatus(401);
    }
}
