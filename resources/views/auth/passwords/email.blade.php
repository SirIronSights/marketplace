@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<h1>Reset Password</h1>

@if (session('status'))
    <div style="color: green;">
        {{ session('status') }}
    </div>
@endif

@if ($errors->any())
    <div style="color: red;">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
    </div>
    <button type="submit">Send Password Reset Link</button>
</form>
@endsection