@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 dark:bg-gray-900 dark:text-white min-h-screen">
    <h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white">Alle geteilten Clips</h1>

    <p class="mb-6">
        <a href="{{ route('clips.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300">
            Neuen Clip teilen
        </a>
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($clips as $clip)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 flex flex-col justify-between transform transition duration-300 hover:scale-105">
                <div>
                    <h2 class="text-xl font-semibold mb-2 text-gray-800 dark:text-white">
                        <a href="{{ route('clips.show', $clip) }}" class="hover:text-blue-600 dark:hover:text-blue-400">
                            {{ $clip->title }}
                        </a>
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">Geteilt von: {{ $clip->user->name }}</p>
                    <img src="{{ $clip->thumbnail_url }}" alt="Clip Thumbnail" class="w-full h-40 object-cover rounded-md mb-4">
                </div>
                <div class="flex items-center justify-between mt-4">
                    <p class="text-gray-700 dark:text-gray-300">Likes: {{ $clip->liked_by_users_count }}</p>
                    @auth
                        @if (Auth::user()->likedClips->contains($clip->id))
                            <form action="{{ route('clips.unlike', $clip) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-sm transition duration-300">
                                    Nicht mehr mögen
                                </button>
                            </form>
                        @else
                            <form action="{{ route('clips.like', $clip) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded text-sm transition duration-300">
                                    Gefällt mir
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection