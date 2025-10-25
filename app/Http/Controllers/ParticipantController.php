<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Participant::all();

        return view('participants.index', compact('participants'));
    }

    public function show(Participant $participant)
    {
        $isSubscribed = false;
        if (
            auth()->check() &&
            auth()->user()->twitch_token &&
            $participant->twitch_username
        ) {
            // $twitchService = new TwitchApiService(auth()->user()->twitch_token);
            // $isSubscribed = $twitchService->checkSubscription(
            //     auth()->user()->twitch_id,
            //     $participant->twitch_username
            // );
        }

        return view('participants.show', compact('participant', 'isSubscribed'));
    }

    public function create()
    {
        return view('participants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:participants,name',
            'user_id' => 'nullable|uuid|exists:users,id',
            'pfp_file' => 'nullable|image|max:2048', // 2MB max
            'is_new' => 'boolean',
            'twitch_username' => 'nullable|string|max:255',
            'youtube_url' => 'nullable|url|max:255',
            'twitch_url' => 'nullable|url|max:255',
        ]);

        $pfpPath = null;
        if ($request->hasFile('pfp_file')) {
            $pfpPath = $request
                ->file('pfp_file')
                ->store('participant_pfps', 'public');
        }

        Participant::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'pfp_path' => $pfpPath,
            'is_new' => $request->has('is_new'),
            'twitch_username' => $request->twitch_username,
            'youtube_url' => $request->youtube_url,
            'twitch_url' => $request->twitch_url,
        ]);

        return redirect()
            ->route('participants.index')
            ->with('success', 'Participant created successfully.');
    }
}
