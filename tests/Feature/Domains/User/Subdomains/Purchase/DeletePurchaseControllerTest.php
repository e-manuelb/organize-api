<?php

namespace Domains\User\Subdomains\Purchase;

use App\Models\Origin;
use App\Models\Purchase;
use App\Models\Wallet;
use Tests\TestCase;

class DeletePurchaseControllerTest extends TestCase
{
    public function testDeletePurchase() {
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

        $response = $this->actingAs($user)->delete("/api/purchase/delete/$purchase->id");

        $response->assertStatus(200);
    }
}
