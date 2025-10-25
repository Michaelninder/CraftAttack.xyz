@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 dark:bg-gray-900 dark:text-white min-h-screen">
    <h1 class="text-3xl font-bold mb-4 text-gray-800 dark:text-white">{{ $clip->title }}</h1>
    <p class="text-gray-600 dark:text-gray-400 mb-6">Geteilt von: {{ $clip->user->name }}</p>

    <div class="video-container relative w-full overflow-hidden" style="padding-top: 56.25%;">
        <iframe
            src="https://clips.twitch.tv/embed?clip={{ $clip->twitch_clip_id }}&parent={{ request()->getHost() }}"
            height="100%"
            width="100%"
            allowfullscreen
            class="absolute top-0 left-0 w-full h-full border-0 rounded-lg shadow-lg">
        </iframe>
    </div>

    <div class="mt-8">
        @auth
            @if (Auth::user()->likedClips->contains($clip->id))
                <form action="{{ route('clips.unlike', $clip) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                        Nicht mehr mögen
                    </button>
                </form>
            @else
                <form action="{{ route('clips.like', $clip) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                        Gefällt mir
                    </button>
                </form>
            @endif
        @endauth
    </div>
</div>
@endsection