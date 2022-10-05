<?php

namespace Domains\User\Subdomains\Purchase;

use App\Models\Origin;
use App\Models\Purchase;
use App\Models\Wallet;
use Illuminate\Http\Response;
use Tests\TestCase;

class PurchaseControllerTest extends TestCase
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

        $response = $this->actingAs($user)->post('/api/purchase/', $purchase);

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
        $response->assertStatus(Response::HTTP_CREATED);

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

        $response = $this->actingAs($user)->post('/api/purchase/', $purchase);

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

        $response->assertStatus(Response::HTTP_CREATED);

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

        $response = $this->post('/api/purchase/', $purchase);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testIndexPurchases(): void
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

        $response = $this->actingAs($user)->get('/api/purchase/');

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

        $response->assertOk();
    }

    public function testIndexPurchasesWhenIsNotLoggedIn(): void
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

        $response = $this->get('/api/purchase/');

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testShowPurchase(): void
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

        $response = $this->actingAs($user)->get("/api/purchase/$purchase->id");

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

        $response->assertOk();
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

        $purchase = Purchase::factory()->create([
            'origin_id' => $origin->id,
            'wallet_id' => $wallet->id,
            'user_id' => $user->id
        ]);

        $response = $this->get("/api/purchase/$purchase->id");

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

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

        $response = $this->actingAs($user)->put("/api/purchase/$purchase->id", $payload);

        $response->assertJson([
            'data' => [
                'description' => 'Gamer Mouse',
                'store_name' => 'Amazon'
            ]
        ]);

        $response->assertOk();
    }

    public function testUpdatePurchaseWhenIsNotLoggedIn(): void
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

        $response = $this->put("/api/purchase/$purchase->id", $payload);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function testDeletePurchase()
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

        $response = $this->actingAs($user)->delete("/api/purchase/$purchase->id");

        $response->assertOk();
    }

    public function testDeletePurchaseWhenIsNotLoggedIn()
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

        $response = $this->delete("/api/purchase/$purchase->id");

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }
}
