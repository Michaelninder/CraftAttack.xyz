@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Create Participant') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.participants.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="twitch_username" :value="__('Twitch Username')" />
                            <x-text-input id="twitch_username" class="block mt-1 w-full" type="text"
                                name="twitch_username" :value="old('twitch_username')" required />
                            <x-input-error :messages="$errors->get('twitch_username')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="pfp" :value="__('Profile Picture')" />
                            <input type="file" name="pfp" id="pfp" class="block mt-1 w-full">
                            <x-input-error :messages="$errors->get('pfp')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="youtube_url" :value="__('YouTube URL')" />
                            <x-text-input id="youtube_url" class="block mt-1 w-full" type="text" name="youtube_url"
                                :value="old('youtube_url')" />
                            <x-input-error :messages="$errors->get('youtube_url')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="twitch_url" :value="__('Twitch URL')" />
                            <x-text-input id="twitch_url" class="block mt-1 w-full" type="text" name="twitch_url"
                                :value="old('twitch_url')" />
                            <x-input-error :messages="$errors->get('twitch_url')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Create') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection