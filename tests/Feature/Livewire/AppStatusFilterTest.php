<?php

namespace Tests\Feature\Livewire;

use App\Livewire\AppPublishStateSwitcer;
use Livewire\Livewire;

test('the component can render', function () {
    $component = Livewire::test(AppPublishStateSwitcer::class);

    $component->assertStatus(200);
});
