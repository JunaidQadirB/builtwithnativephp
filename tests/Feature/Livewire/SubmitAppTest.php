<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\SubmitApp;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
