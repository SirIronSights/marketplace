@extends('layouts.app')

@section('title', 'Login')

@section('content')
<h1>Login</h1>

@if ($errors->any())
    <div style="color: red;">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('login.submit') }}">
    @csrf
    <div>
        <label for="username">Gebruikersnaam:</label>
        <input type="text" name="username" id="username" value="{{ old('username') }}" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
    </div>
    <div>
        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" id="password" required>
    </div>
    <button type="submit">Login</button>
</form>
@endsection