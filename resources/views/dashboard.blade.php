@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold mb-4">{{ __('Willkommen, :name!', ['name' => Auth::user()->name]) }}
                    </h1>
                    <p class="mb-4">{{ __('Deine Rolle: :role', ['role' => Auth::user()->role]) }}</p>

                    @can('member')
                        <div class="mb-4">
                            <a href="{{ route('clips.create') }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Twitch Clip teilen') }}
                            </a>
                        </div>
                    @endcan

                    <div class="space-y-2">
                        <p>
                            <a href="{{ route('participants.index') }}" class="text-indigo-600 hover:text-indigo-900">
                                {{ __('Craftattack Mitglieder ansehen') }}
                            </a>
                        </p>
                        <p>
                            <a href="{{ route('clips.index') }}" class="text-indigo-600 hover:text-indigo-900">
                                {{ __('Geteilte Clips ansehen') }}
                            </a>
                        </p>
                        @can('admin')
                            <p>
                                <a href="{{ route('admin.dashboard') }}" class="text-indigo-600 hover:text-indigo-900">
                                    {{ __('Zum Admin-Dashboard') }}
                                </a>
                            </p>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection