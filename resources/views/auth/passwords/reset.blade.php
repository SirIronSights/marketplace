@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<h1>Reset Password</h1>

@if ($errors->any())
    <div style="color: red;">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $email ?? old('email') ?? '' }}" required>
    </div>
    
    <div>
        <label for="password">New Password:</label>
        <input type="password" name="password" id="password" required>
    </div>

    <div>
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>
    </div>

    <button type="submit">Reset Password</button>
</form>
@endsection