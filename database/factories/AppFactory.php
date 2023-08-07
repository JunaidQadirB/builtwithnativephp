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
            'description' => $this->faker->text(1000),
            'short_description' => $this->faker->text(300),
            'slug' => $this->faker->slug,
            'icon' => $this->faker->imageUrl(256, 256, 'cats'),
            'cover' => $this->faker->imageUrl(1920, 1080, 'cats'),
            'status' => $this->faker->randomElement(['Draft', 'Published']),
            'in_app_purchases' => $this->faker->randomElement([true, false]),
            'price' => $this->faker->randomFloat(2.00, 0.00, 100.00),
            'rating' => $this->faker->randomFloat(1.00, 0.00, 5.00),
            'publisher_id' => AppPublisherFactory::new(),
        ];
    }
}
