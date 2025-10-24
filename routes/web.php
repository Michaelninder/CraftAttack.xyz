<?php

use App\Http\Controllers\Auth\TwitchController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/auth/twitch', [TwitchController::class, 'redirectToTwitch'])
    ->name('auth.twitch');
Route::get('/auth/twitch/callback', [TwitchController::class, 'handleTwitchCallback']);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/members', [MemberController::class, 'index'])->name(
        'members.index',
    );
    Route::get('/members/{member}', [MemberController::class, 'show'])->name(
        'members.show',
    );

    Route::middleware('can:admin')->group(function () {
        Route::get('/admin/members/create', [
            MemberController::class,
            'create',
        ])->name('members.create');
        Route::post('/admin/members', [MemberController::class, 'store'])->name(
            'members.store',
        );
    });

    Route::get('/clips', [ClipController::class, 'index'])->name('clips.index');
    Route::get('/clips/{clip}', [ClipController::class, 'show'])->name(
        'clips.show',
    );
    Route::post('/clips/{clip}/like', [ClipController::class, 'like'])->name(
        'clips.like',
    );
    Route::post('/clips/{clip}/unlike', [ClipController::class, 'unlike'])->name(
        'clips.unlike',
    );

    Route::middleware('can:member')->group(function () {
        Route::get('/clips/share', [ClipController::class, 'create'])->name(
            'clips.create',
        );
        Route::post('/clips', [ClipController::class, 'store'])->name(
            'clips.store',
        );
    });
});
