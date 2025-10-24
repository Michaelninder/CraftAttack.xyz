<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\TwitchController;
use Illuminate\Support\Facades\Route;

Route::get('/auth/twitch', [TwitchController::class, 'redirectToTwitch'])
    ->name('auth.twitch');
Route::get('/auth/twitch/callback', [TwitchController::class, 'handleTwitchCallback']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
