@extends('layouts.app')

@section('content')
    <div class="dark:bg-gray-900 dark:text-white min-h-screen">
        @include('pages.lander._hero')
        @include('pages.lander._goals', ['userCount' => $stats['user_count']])
        @include('pages.lander._stats', ['stats' => $stats])
        @include('pages.lander._participants', ['participants' => $participants])
    </div>
@endsection