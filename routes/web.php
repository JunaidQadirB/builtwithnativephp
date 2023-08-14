<?php

use App\Models\App;
use Illuminate\Support\Facades\Route;

auth()->loginUsingId(2);
Route::get('/', \App\Http\Livewire\AppsList::class)->name('home');

Route::get('apps', \App\Http\Livewire\AppsList::class)->name('apps.index');

Route::get('apps/{app}', \App\Http\Livewire\AppDetails::class)->name('apps.show');

Route::get('categories/{category}', \App\Http\Livewire\CategoryDetails::class)->name('categories.show');

Route::get('submit-app', \App\Http\Livewire\SubmitApp::class)
    ->name('apps.submit');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
