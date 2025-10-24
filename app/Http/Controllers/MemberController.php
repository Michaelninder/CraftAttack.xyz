<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function show(Member $member)
    {
        $isSubscribed = false;
        if (
            auth()->check() &&
            auth()->user()->twitch_token &&
            $member->twitch_username
        ) {
            // $twitchService = new TwitchApiService(auth()->user()->twitch_token);
            // $isSubscribed = $twitchService->checkSubscription(
            //     auth()->user()->twitch_id,
            //     $member->twitch_username
            // );
        }

        return view('members.show', compact('member', 'isSubscribed'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:members,name',
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
                ->store('member_pfps', 'public');
        }

        Member::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'pfp_path' => $pfpPath,
            'is_new' => $request->has('is_new'),
            'twitch_username' => $request->twitch_username,
            'youtube_url' => $request->youtube_url,
            'twitch_url' => $request->twitch_url,
        ]);

        return redirect()
            ->route('members.index')
            ->with('success', 'Member created successfully.');
    }
}