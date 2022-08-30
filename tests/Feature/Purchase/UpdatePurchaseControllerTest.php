<?php

namespace Purchase;

use App\Models\Origin;
use App\Models\Purchase;
use App\Models\Wallet;
use Tests\TestCase;

class UpdatePurchaseControllerTest extends TestCase
{
    public function testUpdatePurchase(): void
    {
        $user = $this->createUser();
        $wallet = Wallet::factory()->create([
            'user_id' => $user->id
        ]);
        $origin = Origin::factory()->create([
            'user_id' => $user->id
        ]);

        $purchase = Purchase::factory()->create([
            'origin_id' => $origin->id,
            'wallet_id' => $wallet->id,
            'user_id' => $user->id
        ]);

        $payload = [
            'description' => 'Gamer Mouse',
            'store_name' => 'Amazon'
        ];

        $response = $this->actingAs($user)->put("/api/purchase/update/$purchase->id", $payload);

        $response->assertJson([
            'data' => [
                'description' => 'Gamer Mouse',
                'store_name' => 'Amazon'
            ]
        ]);

        $response->assertStatus(200);
    }
}
