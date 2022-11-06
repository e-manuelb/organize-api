<?php

namespace Database\Factories;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->lastName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'role_id' => Roles::USER
        ];
    }
}
