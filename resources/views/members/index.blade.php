@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Craftattack Members</h1>

    @can('admin')
        <p><a href="{{ route('members.create') }}">Add New Member</a></p>
    @endcan

    @foreach ($members as $member)
        <div class="member-card">
            @if ($member->pfp_path)
                <img src="{{ Storage::url($member->pfp_path) }}" alt="{{ $member->name }}" width="50">
            @endif
            <h2><a href="{{ route('members.show', $member) }}">{{ $member->name }}</a></h2>
            @if ($member->is_new)
                <span class="badge bg-info">New!</span>
            @endif
            @if ($member->youtube_url)
                <p><a href="{{ $member->youtube_url }}" target="_blank">YouTube</a></p>
            @endif
            @if ($member->twitch_url)
                <p><a href="{{ $member->twitch_url }}" target="_blank">Twitch</a></p>
            @endif
        </div>
    @endforeach
</div>
@endsection