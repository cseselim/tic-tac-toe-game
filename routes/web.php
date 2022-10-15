<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', [App\Http\Controllers\WelcomeController::class,'index'])->name('welcome');

Route::resource('games', App\Http\Controllers\GameController::class)->except(['destroy']);

Route::post('game-histories', [App\Http\Controllers\GameHistoryController::class,'store'])
    ->name('gameHistories.store');

Route::post('game-rounds', [App\Http\Controllers\GameRoundController::class,'store'])->name('gameRounds.store');
