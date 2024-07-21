<?php

namespace Database\Factories;

use App\Models\admin;
use App\Models\category;
use App\Models\media;
use App\Models\tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title"=>fake()->title,
            "content"=>fake()->paragraph,




        ];
    }
}
