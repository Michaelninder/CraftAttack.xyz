@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Admin Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-gray-200 dark:bg-gray-700 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold">{{ __('Total Users') }}</h3>
                            <p class="text-3xl">{{ $userCount }}</p>
                        </div>
                        <div class="bg-gray-200 dark:bg-gray-700 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold">{{ __('Total Participants') }}</h3>
                            <p class="text-3xl">{{ $participantCount }}</p>
                        </div>
                        <div class="bg-gray-200 dark:bg-gray-700 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold">{{ __('Total Clips') }}</h3>
                            <p class="text-3xl">{{ $clipCount }}</p>
                        </div>
                    </div>
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold mb-4">{{ __('Admin Navigation') }}</h3>
                        <nav>
                            <ul class="space-y-2">
                                <li>
                                    <a href="{{ route('admin.participants.index') }}"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        {{ __('Manage Participants') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.users.index') }}"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        {{ __('Manage Users') }}
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection