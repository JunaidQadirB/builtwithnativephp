<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AppPlatformSeeder::class);
        $this->call(AppCategorySeeder::class);

        // Generate apps and assign them to a random category and platform'
        \App\Models\App::factory(100)->create()->each(function ($app) {
            $app->categories()->attach(
                \App\Models\AppCategory::all()->random(rand(1))->pluck('id')->toArray()
            );

            $app->platforms()->attach(
                \App\Models\AppPlatform::all()->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
        // $this->call(AppSeeder::class);
            //

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
