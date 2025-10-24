@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Shared Clips</h1>

    @can('member')
        <p><a href="{{ route('clips.create') }}">Share a New Clip</a></p>
    @endcan

    @foreach ($clips as $clip)
        <div class="clip-card">
            <h2><a href="{{ route('clips.show', $clip) }}">{{ $clip->title }}</a></h2>
            <p>Shared by: {{ $clip->user->name }}</p>
            <img src="{{ $clip->thumbnail_url }}" alt="Clip Thumbnail" width="200">
            <p>Likes: {{ $clip->liked_by_users_count }}</p>
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
    @endforeach
</div>
@endsection