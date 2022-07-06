<?php

namespace Database\Factories;

use App\Models\Origin;
use Illuminate\Database\Eloquent\Factories\Factory;

class OriginFactory extends Factory
{
    protected $model = Origin::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'user_id' => $this->faker->randomNumber(),
        ];
    }
}
