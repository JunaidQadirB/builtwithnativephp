<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\App>
 */
class AppFactory extends Factory
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'slug' => $this->faker->slug,
            'icon' => $this->faker->imageUrl(256, 256, 'cats'),
            'status' => $this->faker->randomElement(['Draft', 'Published']),
            'in_app_purchases' => $this->faker->randomElement([true, false]),
            'price' => $this->faker->randomFloat(2.00, 0.00, 100.00),
        ];
    }
}
