@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<h1>Nieuwe User Aanmaken</h1>
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <label>
        <input type="checkbox" name="notify_by_email" value="1">
        Notify me by email when I receive a new message
    </label>
    <br>
    <button type="submit">Opslaan</button>
</form>
    <p>This is the content for the page.</p>
@endsection 