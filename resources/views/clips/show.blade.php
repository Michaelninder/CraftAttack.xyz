@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $clip->title }}</h1>
    <p>Shared by: {{ $clip->user->name }}</p>

    <div class="video-container">
        <iframe
            src="{{ $clip->embed_url }}"
            height="360"
            width="640"
            frameborder="0"
            scrolling="no"
            allowfullscreen="true">
        </iframe>
    </div>

    @auth
        @if (Auth::user()->likedClips->contains($clip->id))
            <form action="{{ route('clips.unlike', $clip) }}" method="POST">
                @csrf
                <button type="submit">Unlike</button>
            </form>
        @else
            <form action="{{ route('clips.like', $clip) }}" method="POST">
                @csrf
                <button type="submit">Like</button>
            </form>
        @endif
    @endauth
</div>
@endsection