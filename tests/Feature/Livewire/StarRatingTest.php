<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\StarRating;
use App\Models\App;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Tests\TestCase;

class StarRatingTest extends TestCase
{
    /** @test */
    public function the_component_can_render(): void
    {
        $app = App::factory()->create();
        $component = Livewire::test(StarRating::class,
            ['app' => $app]);

        $component->assertStatus(200);
    }


}
