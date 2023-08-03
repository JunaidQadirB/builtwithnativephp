<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AppPlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $platforms = [
            'Linux',
            'MacOS',
            'Windows',
        ];

        foreach ($platforms as $platform) {
            \App\Models\AppPlatform::factory()->create([
                'name' => $platform,
                'slug' => Str::slug($platform),
                'status' => 'Publish',
            ]);
        }
    }
}
