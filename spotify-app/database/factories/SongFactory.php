<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(rand(1, 5), true),
            'artist' => fake()->words(rand(1, 3), true),
            'album' => fake()->words(rand(1, 7), true),
            'year' => rand(1970, 2023),
            'file' => 'https://cdn.pixabay.com/audio/2023/10/06/audio_14f9198f0b.mp3',
            'photo' => 'https://picsum.photos/500/500/?' . rand(0, 1210000)
        ];
    }
}
