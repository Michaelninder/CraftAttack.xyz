@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 dark:bg-gray-900 dark:text-white min-h-screen">
    <h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white">{{ $participant->name }}</h1>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 max-w-lg mx-auto">
        @if ($participant->pfp_path)
            <img src="{{ Storage::url($participant->pfp_path) }}" alt="{{ $participant->name }}" class="w-32 h-32 object-cover rounded-full mx-auto mb-6 border-4 border-gray-300 dark:border-gray-600">
        @else
            <div class="w-32 h-32 flex items-center justify-center bg-gray-200 dark:bg-gray-700 rounded-full mx-auto mb-6 text-gray-500 dark:text-gray-400 text-5xl font-bold">
                {{ strtoupper(substr($participant->name, 0, 1)) }}
            </div>
        @endif

        @if ($participant->is_new)
            <span class="block text-center mb-4 inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">
                Neuer Teilnehmer!
            </span>
        @endif

        <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-3">Social Links:</h2>
        <ul class="space-y-2 text-gray-700 dark:text-gray-300">
            @if ($participant->youtube_url)
                <li>
                    <a href="{{ $participants->youtube_url }}" target="_blank" class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 flex items-center space-x-2 transition duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M19.615 3.184c-3.11-.293-6.22-.293-9.33 0C7.14 3.477 4.54 5.378 3.54 7.97c-.293 3.11-.293 6.22 0 9.33.293 2.593 2.893 4.494 6.745 4.787 3.11.293 6.22.293 9.33 0 3.852-.293 6.452-2.194 7.037-4.787.293-3.11.293-6.22 0-9.33-.585-2.592-3.185-4.493-7.037-4.786zM9.545 15.65v-7.3c0-.18.06-.298.156-.358.096-.06.215-.06.354.001l5.488 3.65c.18.12.27.24.27.359 0 .119-.09.24-.27.36l-5.488 3.65c-.14.06-.258.06-.354 0-.096-.06-.156-.178-.156-.358z" />
                        </svg>
                        <span>YouTube</span>
                    </a>
                </li>
            @endif
            @if ($participant->twitch_url)
                <li>
                    <a href="{{ $participant->twitch_url }}" target="_blank" class="text-purple-600 hover:text-purple-800 dark:text-purple-400 dark:hover:text-purple-300 flex items-center space-x-2 transition duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M19.605 10.605c.42.42 1.05.42 1.47 0 .42-.42.42-1.05 0-1.47l-3.33-3.33a1.047 1.047 0 00-1.47 0L13 8.79l-4.2-4.2a1.05 1.05 0 00-1.47 0l-4.2 4.2a1.05 1.05 0 000 1.47l4.2 4.2a1.05 1.05 0 001.47 0L13 10.21l3.33 3.33a1.05 1.05 0 001.47 0l1.8-1.8zM2 13.5v7.5c0 .825.675 1.5 1.5 1.5h18c.825 0 1.5-.675 1.5-1.5v-7.5c0-.825-.675-1.5-1.5-1.5H3.5c-.825 0-1.5.675-1.5 1.5zm19.5 0v7.5h-18v-7.5h18zM14 17c0 .55-.45 1-1 1h-2c-.55 0-1-.45-1-1v-2c0-.55.45-1 1-1h2c.55 0 1 .45 1 1v2z" clip-rule="evenodd" />
                        </svg>
                        <span>Twitch</span>
                    </a>
                </li>
            @endif
        </ul>

        <div class="mt-8 text-center">
            @if ($isSubscribed)
                <p class="text-green-600 dark:text-green-400 font-semibold text-lg">
                    Du bist Sub bei {{ $participant->name }}!
                </p>
            @else
                <p class="text-gray-500 dark:text-gray-400 text-lg">
                    {{ $participant->name }} nicht abonniert (oder kann nicht überprüft werden).
                </p>
            @endif
        </div>
    </div>
</div>
@endsection