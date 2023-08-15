<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AppPlatform>
 */
class AppPlatformFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $platforms = [
            'Linux',
            'MacOS',
            'Windows',
        ];

        $platform = $platforms[array_rand($platforms)];

        return [
            'name' => $platform,
            'slug' => Str::slug($platform),
            'status' => 'Publish',
        ];
    }
}
