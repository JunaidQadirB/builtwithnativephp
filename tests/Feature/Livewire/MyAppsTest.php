<?php

namespace Tests\Feature\Livewire;

use App\Livewire\MyApps;
use Livewire\Livewire;

test('the component can render', function () {
    $component = Livewire::test(MyApps::class);

    $component->assertStatus(200);
});

test('authenticated users can access this page', function () {
    $this->get('/my-apps')
        ->assertRedirect('/login');

    $user = \App\Models\User::factory()->create();
    $this->actingAs($user)
        ->get('/my-apps')
        ->assertStatus(200)
        ->assertSee('My Apps');
});

test('the component can render with apps', function () {
    $user = \App\Models\User::factory()->create();
    $component = Livewire::actingAs($user)
        ->test(MyApps::class);

    $component->assertStatus(200);
});

test('a user can see all of his submitted apps', function () {
    $user = \App\Models\User::factory()->create();
    $apps = \App\Models\App::factory()->count(3)->create([
        'publisher_id' => $user->id,
    ]);

    $component = Livewire::actingAs($user)
        ->test(MyApps::class);

    $component->assertStatus(200);
});
