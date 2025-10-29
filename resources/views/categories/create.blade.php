@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<h1>Nieuwe Category Aanmaken</h1>
<form action="{{ route('categories.store') }}" method="POST">
@csrf
    <label for="name">Naam:</label>
    <input type="text" id="name" name="name" required>
    <br>
    <label for="text">Beschrijving:</label>
    <textarea id="text" name="text"></textarea>
    <br>
    <button type="submit">Opslaan</button>
</form>
    <p>This is the content for the page.</p>
@endsection 