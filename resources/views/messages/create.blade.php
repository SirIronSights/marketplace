@extends('layouts.app')

@section('title', 'New Message')

@section('content')
<h1>Verstuur Bericht</h1>

<form method="POST" action="{{ route('messages.store') }}">
    @csrf

    <label for="receiver_id">To:</label><br>
    <select name="receiver_id" id="receiver_id" required>
        <option value="">Gebruiker</option>
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->username }}</option>
        @endforeach
    </select>
    <br><br>

    <label for="title">Title:</label><br>
    <input type="text" id="title" name="title" value="{{ old('title') }}" required><br><br>

    <label for="text">Message:</label><br>
    <textarea id="text" name="text" rows="6" cols="50" required>{{ old('text') }}</textarea><br><br>

    <button type="submit">Stuur</button>
</form>

<a href="{{ route('messages.index') }}" style="margin-top: 10px; display: inline-block;">terug naar inbox</a>
@endsection