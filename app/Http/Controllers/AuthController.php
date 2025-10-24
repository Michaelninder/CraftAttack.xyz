<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToTwitch(): RedirectResponse
    {
        return Socialite::driver('twitch')
            ->scopes(['user:read:follows', 'user:read:email'])
            ->redirect();
    }

    public function handleTwitchCallback(): RedirectResponse
    {
        try {
            $twitchUser = Socialite::driver('twitch')->user();
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Twitch authentication failed. Please try again.');
        }

        $user = User::firstOrCreate(
            ['twitch_id' => $twitchUser->id],
            [
                'name' => $twitchUser->name,
                'email' => $twitchUser->email,
                'twitch_username' => $twitchUser->nickname,
                'twitch_avatar' => $twitchUser->avatar,
                'twitch_token' => $twitchUser->token,
                'twitch_refresh_token' => $twitchUser->refreshToken,
            ]
        );

        Auth::login($user, true);

        return redirect('/dashboard');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}