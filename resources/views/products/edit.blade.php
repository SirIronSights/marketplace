@extends('layouts.app')

@section('title', 'Page Title')

<h1>Product Bewerken</h1>
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="title">Naam:</label>
    <input type="text" id="title" name="title" value="{{ $product->title }}" required>
    <br>
    <label for="text">Beschrijving:</label>
    <input type="text" id="text" name="text" value="{{ $product->text }}">
    <br>
    <label for="category">Categorie:</label>
    <label for="categories">Categories:</label>
    <select name="categories[]" id="categories" multiple>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" 
                {{ $product->categories->contains($category->id) ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <button type="submit">Bijwerken</button>
</form>
@section('content')
    <p>This is the content for the page.</p>
@endsection