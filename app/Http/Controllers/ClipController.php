<?php

namespace App\Http\Controllers;

use App\Models\Clip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class ClipController extends Controller
{
    public function index()
    {
        $clips = Clip::withCount('likedByUsers')->latest()->get();
        return view('clips.index', compact('clips'));
    }

    public function show(Clip $clip)
    {
        return view('clips.show', compact('clip'));
    }

    public function create()
    {
        // Show form for members to share clips
        return view('clips.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'twitch_clip_url' => 'required|url|regex:/twitch\.tv\/[a-zA-Z0-9_]+\/clip\/[a-zA-Z0-9_]+/|max:255',
        ]);

        // Extract clip ID from URL
        preg_match(
            '/clip\/([a-zA-Z0-9_]+)/',
            $request->twitch_clip_url,
            $matches,
        );
        $twitchClipId = $matches[1] ?? null;

        if (!$twitchClipId) {
            return back()->withErrors([
                'twitch_clip_url' => 'Could not extract Twitch clip ID.',
            ]);
        }

        $clipData = [
            'title' => 'Twitch Clip ' . $twitchClipId,
            'embed_url' =>
                'https://clips.twitch.tv/embed?clip=' .
                $twitchClipId .
                '&parent=' .
                request()->getHost(),
            'thumbnail_url' =>
                'https://clips-media-assets2.twitch.tv/placeholder_thumbnail.jpg', // Replace with actual
        ];

        /*
        $response = Http::withHeaders([
            'Client-ID' => env('TWITCH_CLIENT_ID'),
            'Authorization' => 'Bearer ' . env('TWITCH_APP_ACCESS_TOKEN'), // Or user token
        ])->get("https://api.twitch.tv/helix/clips?id={$twitchClipId}");

        if ($response->successful() && !empty($response['data'])) {
            $data = $response['data'][0];
            $clipData = [
                'title' => $data['title'],
                'embed_url' => $data['embed_url'],
                'thumbnail_url' => $data['thumbnail_url'],
            ];
        } else {
             return back()->withErrors(['twitch_clip_url' => 'Failed to fetch clip details.']);
        }
        */

        Clip::create([
            'user_id' => Auth::id(),
            'twitch_clip_id' => $twitchClipId,
            'title' => $clipData['title'],
            'embed_url' => $clipData['embed_url'],
            'thumbnail_url' => $clipData['thumbnail_url'],
        ]);

        return redirect()
            ->route('clips.index')
            ->with('success', 'Clip shared successfully!');
    }

    public function like(Clip $clip)
    {
        Auth::user()->likedClips()->syncWithoutDetaching([$clip->id]);
        return back()->with('success', 'Clip liked!');
    }

    public function unlike(Clip $clip)
    {
        Auth::user()->likedClips()->detach($clip->id);
        return back()->with('success', 'Clip unliked!');
    }
}