<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('investments', function () {
    return [
        [
            'id' => 1,
            'title' => 'Mutual Funds',
            'image' => './assets/img/investments/mutual-funds.png',
            'investment' => '4,000.00',
            'currentValue' => '3,250.00',
        ],
        [
            'id' => 2,
            'title' => 'Commodities',
            'image' => './assets/img/investments/commodities.png',
            'investment' => '12,000.00',
            'currentValue' => '13,250.00',
        ],
        [
            'id' => 3,
            'title' => 'Crypto',
            'image' => './assets/img/investments/crypto.png',
            'investment' => '10,000.00',
            'currentValue' => '11,280.00',
        ],
        [
            'id' => 4,
            'title' => 'Gold',
            'image' => './assets/img/investments/gold.png',
            'investment' => '3,000.00',
            'currentValue' => '2,250.00',
        ],
    ];
});
