<?php

namespace Database\Factories;

use App\Models\Purchase;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseFactory extends Factory
{
    protected $model = Purchase::class;

    public function definition(): array
    {
        return [
            'description' => 'Random Keyboard',
            'store_name' => 'Random Store',
            'store_id' => $this->faker->randomNumber(1, 1000),
            'date' => now(),
            'origin_id' => '0', // Must be set
            'wallet_id' => '0', // Must be set
            'value' => $this->faker->randomFloat(2, 200, 600),
            'is_installments' => true,
            'installments_number' => $this->faker->randomNumber(1, 12),
            'user_id' => '0' // Must be set
        ];
    }
}
