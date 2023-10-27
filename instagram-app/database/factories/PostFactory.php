<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use function PHPSTORM_META\map;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'file' => 'https://picsum.photos/1080/1080/?' . rand(0, 10000),
            'description' => fake()->sentence(22),
            'user_id' => rand(1, 11),
            'location' => fake()->city()
        ];
    }
}
