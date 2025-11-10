@extends('layouts.app')

@section('title', 'Page Title')

<h1>Item Bewerken</h1>
<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="username">Naam:</label>
    <input type="text" id="username" name="username" value="{{ $user->username }}" required>
    <br>
    <label for="email">Beschrijving:</label>
    <input type="email" id="email" name="email" value="{{ $user->email }}" required>
    <br>
    <label for="password">Wachtwoord (leave empty to keep current):</label>
    <input type="password" id="password" name="password" required>
    <br>
    <label>
    <input type="checkbox" name="notify_by_email" value="1"
        {{ $user->notify_by_email ? 'checked' : '' }}>
        Notify me by email when I receive a new message
    </label>
    <br>
    <button type="submit">Bijwerken</button>
</form>
@section('content')
    <p>This is the content for the page.</p>
@endsection