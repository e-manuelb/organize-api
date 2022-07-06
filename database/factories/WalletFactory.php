<?php

namespace Database\Factories;


use App\Models\Wallet;
use Illuminate\Database\Eloquent\Factories\Factory;

class WalletFactory extends Factory
{
    protected $model = Wallet::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'user_id' => $this->faker->randomNumber(),
        ];
    }

}
