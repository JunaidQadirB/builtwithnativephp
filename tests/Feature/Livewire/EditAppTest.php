<? php

use App\Livewire\EditApp;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(EditApp::class)
        ->assertStatus(200);
});
