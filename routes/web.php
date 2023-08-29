<?php

use App\Livewire\AppsList;
use App\Models\App;
use Illuminate\Support\Facades\Route;

auth()->loginUsingId(2);
Route::get('/', AppsList::class)->name('home');

Route::get('apps/{app}/edit', function (App $app) {
    return view('apps.edit', compact('app'));
})->name('apps.edit');

Route::put('apps/{app}', function ($app) {
})->name('apps.update');

Route::get('apps', AppsList::class)->name('apps.index');

Route::get('apps/{app}', \App\Livewire\AppDetails::class)->name('apps.show');

Route::get('categories/{category}', \App\Livewire\CategoryDetails::class)->name('categories.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('submit-app', \App\Livewire\SubmitApp::class)
        ->name('apps.submit');
    Route::get('my-apps', \App\Livewire\MyApps::class)
        ->name('my-apps');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
