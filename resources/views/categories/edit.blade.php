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
    <label for="description">Beschrijving:</label>
    <textarea id="description" name="description">{{ $category->description }}</textarea>
    <br>
    <button type="submit">Bijwerken</button>
</form>
    <p>This is the content for the page.</p>
@endsection