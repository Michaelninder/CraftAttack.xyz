<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participants = Participant::all();
        return view('admin.participants.index', compact('participants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.participants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'twitch_username' => 'required|string|max:255|unique:participants',
            'pfp' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'youtube_url' => 'nullable|url',
            'twitch_url' => 'nullable|url',
        ]);

        $data = $request->except('pfp');

        if ($request->hasFile('pfp')) {
            $data['pfp_path'] = $request->file('pfp')->store('pfps', 'public');
        }

        Participant::create($data);

        return redirect()->route('admin.participants.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Participant $participant)
    {
        // Not used
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participant $participant)
    {
        return view('admin.participants.edit', compact('participant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Participant $participant)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'twitch_username' => 'required|string|max:255|unique:participants,twitch_username,' . $participant->id,
            'pfp' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'youtube_url' => 'nullable|url',
            'twitch_url' => 'nullable|url',
        ]);

        $data = $request->except('pfp');

        if ($request->hasFile('pfp')) {
            if ($participant->pfp_path) {
                Storage::disk('public')->delete($participant->pfp_path);
            }
            $data['pfp_path'] = $request->file('pfp')->store('pfps', 'public');
        }

        $participant->update($data);

        return redirect()->route('admin.participants.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participant $participant)
    {
        if ($participant->pfp_path) {
            Storage::disk('public')->delete($participant->pfp_path);
        }
        $participant->delete();
        return redirect()->route('admin.participants.index');
    }
}
