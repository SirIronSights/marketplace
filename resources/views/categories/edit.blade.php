@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

<h1>Categorie Bewerken</h1>
<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="name">Naam:</label>
    <input type="text" id="name" name="name" value="{{ $category->name }}" required>
    <br>
    <button type="submit">Bijwerken</button>
</form>
    <p>This is the content for the page.</p>
@endsection