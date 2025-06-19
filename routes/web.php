<?php

use App\Http\Controllers\CoinTossController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return view('game');
});

Route::post('api/coin-toss', [CoinTossController::class, 'play']);

Route::post('/reset', function () {
    Session::forget(['win_count', 'total_count']);
    return response()->json(['message' => 'リセットしました']);
});
