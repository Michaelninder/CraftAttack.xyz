@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 dark:bg-gray-900 dark:text-white min-h-screen">
    <h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white">Craftattack Teilnehmer</h1>

    @can('admin')
        <p class="mb-6">
            <a href="{{ route('participants.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                Neuen Teilnehmer hinzufügen
            </a>
        </p>
    @endcan

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($participants as $participant)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 flex items-center space-x-4 transform transition duration-300 hover:scale-105">
                @if ($participant->pfp_path)
                    <img src="{{ Storage::url($participant->pfp_path) }}" alt="{{ $participant->name }}" class="w-16 h-16 object-cover rounded-full border-2 border-gray-300 dark:border-gray-600">
                @else
                    <div class="w-16 h-16 flex items-center justify-center bg-gray-200 dark:bg-gray-700 rounded-full text-gray-500 dark:text-gray-400 text-xl font-bold">
                        {{ strtoupper(substr($participant->name, 0, 1)) }}
                    </div>
                @endif
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-1">
                        <a href="{{ route('participants.show', $participant) }}" class="hover:text-blue-600 dark:hover:text-blue-400">
                            {{ $participant->name }}
                        </a>
                        @if ($participant->is_new)
                            <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100">
                                Neu!
                            </span>
                        @endif
                    </h2>
                    <div class="flex space-x-2 mt-2">
                        @if ($participant->youtube_url)
                            <a href="{{ $participant->youtube_url }}" target="_blank" class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300 transition duration-300">
                                YouTube
                            </a>
                        @endif
                        @if ($participant->twitch_url)
                            <a href="{{ $participant->twitch_url }}" target="_blank" class="text-purple-600 hover:text-purple-800 dark:text-purple-400 dark:hover:text-purple-300 transition duration-300">
                                Twitch
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection