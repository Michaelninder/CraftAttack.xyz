@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 dark:bg-gray-900 dark:text-white min-h-screen">
    <h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white">Twitch Clip teilen</h1>

    <form action="{{ route('clips.store') }}" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="twitch_clip_url" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                Twitch Clip URL:
            </label>
            <input type="url" name="twitch_clip_url" id="twitch_clip_url" required value="{{ old('twitch_clip_url') }}"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600">
            <small class="text-gray-500 dark:text-gray-400 text-xs mt-1 block">
                Beispiel: https://clips.twitch.tv/AmazingBlindingSandwichVoteYea-aBcDeF123GHiJkL
            </small>
            @error('twitch_clip_url')
                <span class="text-red-500 text-xs italic mt-2 block">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300">
            Clip teilen
        </button>
    </form>
</div>
@endsection