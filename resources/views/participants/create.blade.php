@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Craftattack Member</h1>

    <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required value="{{ old('name') }}">
            @error('name') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="user_id">Link to User (Optional UUID):</label>
            <input type="text" name="user_id" id="user_id" value="{{ old('user_id') }}">
            @error('user_id') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="pfp_file">Profile Picture:</label>
            <input type="file" name="pfp_file" id="pfp_file">
            @error('pfp_file') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <input type="checkbox" name="is_new" id="is_new" {{ old('is_new') ? 'checked' : '' }}>
            <label for="is_new">Is New Member?</label>
        </div>
        <div>
            <label for="twitch_username">Twitch Username (for sub-check):</label>
            <input type="text" name="twitch_username" id="twitch_username" value="{{ old('twitch_username') }}">
            @error('twitch_username') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="youtube_url">YouTube URL:</label>
            <input type="url" name="youtube_url" id="youtube_url" value="{{ old('youtube_url') }}">
            @error('youtube_url') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="twitch_url">Twitch Channel URL:</label>
            <input type="url" name="twitch_url" id="twitch_url" value="{{ old('twitch_url') }}">
            @error('twitch_url') <span>{{ $message }}</span> @enderror
        </div>
        <button type="submit">Add Member</button>
    </form>
</div>
@endsection