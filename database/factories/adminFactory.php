<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin>
 */
class adminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "username"=>fake()->userName,
            "email"=>fake()->safeEmail,
            "password"=>fake()->word,
            "phone_number"=>fake()->phoneNumber,
            "email_verified_at"=>fake()->date('Y-m-d H:i:s'),
            "remember_token"=>fake()->word,




        ];
    }
}
