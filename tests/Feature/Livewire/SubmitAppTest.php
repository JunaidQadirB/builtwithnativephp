<?php

namespace Tests\Feature\Livewire;

use App\Livewire\SubmitApp;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;

test('component exists on the page', function () {
    $user = \App\Models\User::factory()->create();
    Auth::login($user);

    $this->get('/submit-app')
        ->assertSeeLivewire(SubmitApp::class);
});

test('the component can render', function () {
    $component = Livewire::test(SubmitApp::class);

    $component->assertStatus(200);
});

test('the component can validate required fields', function () {
    $component = Livewire::test(SubmitApp::class);

    $component
        ->call('submit')
        ->assertHasErrors([
            'name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'icon' => 'required',
        ]);
});

test('the component can validate icon dimensions', function () {
    $component = Livewire::test(SubmitApp::class);

    $component
        ->set('icon', UploadedFile::fake()->image('image.png', 511, 511))
        ->call('submit')
        ->assertHasErrors([
            'icon' => 'dimensions:width=512,height=512',
        ]);

    $component
        ->set('icon', UploadedFile::fake()->image('image.png', 512, 512))
        ->call('submit')
        ->assertHasNoErrors([
            'icon' => 'dimensions:width=512,height=512',
        ]);
});

test('the component can validate icon mimes', function () {
    $component = Livewire::test(SubmitApp::class);

    $component
        ->set('icon', UploadedFile::fake()->image('image.png', 512, 512))
        ->call('submit')
        ->assertHasNoErrors([
            'icon' => 'mimes',
        ]);

    $component
        ->set('icon', UploadedFile::fake()->image('image.jpg', 512, 512))
        ->call('submit')
        ->assertHasErrors([
            'icon' => 'mimes',
        ]);

    $component
        ->set('icon', UploadedFile::fake()
            ->create('not-a-png-image.pdf', 512, 512))
        ->call('submit')
        ->assertHasErrors([
            'icon' => 'mimes',
        ]);
});

test('The app icon image file is stored correctly', function () {
    $user = \App\Models\User::factory()->create();
    Auth::login($user);

    $component = Livewire::test(SubmitApp::class);

    @unlink(storage_path('app/public/icons/my-app.png'));
    $this->assertFileDoesNotExist(storage_path('app/public/icons/my-app.png'));

    $component
        ->set('name', 'My App')
        ->set('short_description', 'My App Short Description')
        ->set('description', 'My App Description')
        ->set('publisher_id', $user->id)
        ->set('icon', UploadedFile::fake()->image('image.png', 512, 512))
        ->call('submit')
        ->assertHasNoErrors();

    $this->assertFileExists(storage_path('app/public/icons/my-app.png'));

    $app = \App\Models\App::where('name', 'My App')->first();
    $this->assertSame('my-app.png', $app->icon);
});
