<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MatchController;

Route::resource('matches', MatchController::class);
Route::resource('players', PlayerController::class);
Route::resource('teams', TeamController::class);
Route::get('/tournament', function () {
       return view('tournament');
});
Route::get('/', function () {
    return view('home');
});