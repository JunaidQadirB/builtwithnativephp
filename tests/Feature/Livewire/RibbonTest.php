<?php

namespace Tests\Feature\Livewire;

use App\Livewire\Ribbon;
use Livewire\Livewire;
use Tests\TestCase;

class RibbonTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Ribbon::class);

        $component->assertStatus(200);
    }
}
