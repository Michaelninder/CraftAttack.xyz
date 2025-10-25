@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome, {{ Auth::user()->name }}!</h1>
    <p>Your Role: {{ Auth::user()->role }}</p>

    @can('member')
        <a href="{{ route('clips.create') }}">Share a Twitch Clip</a>
    @endcan

    <p><a href="{{ route('participants.index') }}">View Craftattack Members</a></p>
    <p><a href="{{ route('clips.index') }}">View Shared Clips</a></p>
</div>
@endsection