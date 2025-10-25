<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\TwitchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ClipController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\Admin\ParticipantController as AdminParticipantController;
use Illuminate\Support\Facades\Route;

Route::get('/auth/twitch', [TwitchController::class, 'redirectToTwitch'])
    ->name('auth.twitch');
Route::get('/auth/twitch/callback', [TwitchController::class, 'handleTwitchCallback']);

Route::get('/', [PageController::class, 'lander'])->name('pages.lander');

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

    Route::get('/participants', [ParticipantController::class, 'index'])->name(
        'participants.index',
    );
    Route::get('/participants/{participant}', [ParticipantController::class, 'show'])->name(
        'participants.show',
    );

    Route::middleware('can:admin')->group(function () {
        Route::get('/admin/participants/create', [
            ParticipantController::class,
            'create',
        ])->name('participants.create');
        Route::post('/admin/participants', [ParticipantController::class, 'store'])->name(
            'participants.store',
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

    Route::get('/clips/share', [ClipController::class, 'create'])->name(
        'clips.create',
    );
    Route::post('/clips', [ClipController::class, 'store'])->name(
        'clips.store',
    );
});

Route::middleware(['auth', 'can:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('participants', AdminParticipantController::class);
    Route::resource('users', UserController::class);
});



Route::get('/new-clip', [ClipController::class, 'create'])->name('test.clips.create',);
