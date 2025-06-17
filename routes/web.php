<?php

use App\Http\Controllers\CoinTossController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('game');
});

Route::post('api/coin-toss', [CoinTossController::class, 'play']);
