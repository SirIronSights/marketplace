@extends('layouts.app')

@section('title', 'Edit User')

@section('content')

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
    <label for="password">Wachtwoord</label>
    <input type="password" id="password" name="password">
    <br>
    <label>
    <input type="checkbox" name="notify_by_email" value="1"
        {{ $user->notify_by_email ? 'checked' : '' }}>
        Vertel me wanneed ik een bericht ontvang op email
    </label>
    <br>
    <button type="submit">Bijwerken</button>
</form>
    <p>This is the content for the page.</p>
@endsection