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
    <textarea id="email" name="email">{{ $user->email }}</textarea>
    <br>
    <label for="password">Password:</label>
    <textarea id="password" name="password">{{$user->password }}</textarea>
    <br>
    <button type="submit">Bijwerken</button>
</form>
@section('content')
    <p>This is the content for the page.</p>
@endsection