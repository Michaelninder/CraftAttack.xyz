@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Twitch Clip teilen</h1>

    <form action="{{ route('clips.store') }}" method="POST">
        @csrf
        <div>
            <label for="twitch_clip_url">Twitch Clip URL:</label>
            <input type="url" name="twitch_clip_url" id="twitch_clip_url" required value="{{ old('twitch_clip_url') }}">
            <small>Beispiel: https://clips.twitch.tv/AmazingBlindingSandwichVoteYea-aBcDeF123GHiJkL</small>
            @error('twitch_clip_url') <span>{{ $message }}</span> @enderror
        </div>
        <button type="submit">Clip teilen</button>
    </form>
</div>
@endsection