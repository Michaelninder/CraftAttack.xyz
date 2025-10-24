@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $member->name }}</h1>

    @if ($member->pfp_path)
        <img src="{{ Storage::url($member->pfp_path) }}" alt="{{ $member->name }}" width="150">
    @endif

    @if ($member->is_new)
        <span class="badge bg-info">New Member!</span>
    @endif

    <p>Social Links:</p>
    <ul>
        @if ($member->youtube_url)
            <li><a href="{{ $member->youtube_url }}" target="_blank">YouTube</a></li>
        @endif
        @if ($member->twitch_url)
            <li><a href="{{ $member->twitch_url }}" target="_blank">Twitch</a></li>
        @endif
    </ul>

    @if ($isSubscribed)
        <p class="text-success">You are subscribed to {{ $member->name }}!</p>
    @else
        <p class="text-muted">Not subscribed to {{ $member->name }} (or cannot check).</p>
    @endif
</div>
@endsection