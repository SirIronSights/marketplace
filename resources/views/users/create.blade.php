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
    <textarea id="email" name="email"></textarea>
    <br>
    <label for="password">Password:</label>
    <textarea id="password" name="password"></textarea>
    <br>
    <button type="submit">Opslaan</button>
</form>
    <p>This is the content for the page.</p>
@endsection 