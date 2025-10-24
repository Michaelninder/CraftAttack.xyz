<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class TwitchController extends Controller
{
    public function redirectToTwitch()
    {
        return Socialite::driver('twitch')->scopes(['user:read:email'])->redirect();
    }

    public function handleTwitchCallback()
    {
        try {
            $twitchUser = Socialite::driver('twitch')->user();

            $user = User::updateOrCreate(
                ['twitch_id' => $twitchUser->id],
                [
                    'name' => $twitchUser->nickname,
                    'email' => $twitchUser->email,
                    'twitch_token' => $twitchUser->token,
                ],
            );

            Auth::login($user);

            return redirect('/dashboard');
        } catch (\Exception $e) {
            // Log the error
            return redirect('/login')->withErrors([
                'twitch' => 'Unable to login with Twitch. Please try again.',
            ]);
        }
    }
}