@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $clip->title }}</h1>
    <p>Geteilt von: {{ $clip->user->name }}</p>

    <div class="video-container">
        <iframe
            src="https://clips.twitch.tv/embed?clip={{ $clip->twitch_clip_id }}&parent={{ request()->getHost() }}"
            height="360"
            width="640"
            allowfullscreen>
        </iframe>
    </div>

    @auth
        @if (Auth::user()->likedClips->contains($clip->id))
            <form action="{{ route('clips.unlike', $clip) }}" method="POST">
                @csrf
                <button type="submit">Nicht mehr mögen</button>
            </form>
        @else
            <form action="{{ route('clips.like', $clip) }}" method="POST">
                @csrf
                <button type="submit">Gefällt mir</button>
            </form>
        @endif
    @endauth
</div>
@endsection