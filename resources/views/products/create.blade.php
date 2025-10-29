@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
<h1>Nieuw Product Aanmaken</h1>
<form action="{{ route('products.store') }}" method="POST">
@csrf
    <label for="title">Naam:</label>
    <input type="text" id="title" name="title" required>
    <br>
    <label for="text">Beschrijving:</label>
    <textarea id="text" name="text"></textarea>
    <br>
    <button type="submit">Opslaan</button>
</form>
    <p>This is the content for the page.</p>
@endsection 