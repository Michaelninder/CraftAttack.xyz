@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Share a Twitch Clip</h1>

    <form action="{{ route('clips.store') }}" method="POST">
        @csrf
        <div>
            <label for="twitch_clip_url">Twitch Clip URL:</label>
            <input type="url" name="twitch_clip_url" id="twitch_clip_url" required value="{{ old('twitch_clip_url') }}">
            <small>Example: https://clips.twitch.tv/AmazingBlindingSandwichVoteYea-aBcDeF123GHiJkL</small>
            @error('twitch_clip_url') <span>{{ $message }}</span> @enderror
        </div>
        <button type="submit">Share Clip</button>
    </form>
</div>
@endsection