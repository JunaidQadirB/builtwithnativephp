<?php

namespace Tests\Feature\Livewire;

use App\Livewire\SubmitApp;
use Livewire\Livewire;
use Tests\TestCase;

class SubmitAppTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(SubmitApp::class);

        $component->assertStatus(200);
    }
}
