@extends('layouts.app')

@section('title', 'Page Title')

@section('content')
@auth
<h1>Nieuw Product Aanmaken</h1>
<form action="{{ route('products.store') }}" method="POST">
@csrf
    <label for="title">Naam:</label>
        <input type="text" id="title" name="title" required>
    <br>
    <label for="text">Beschrijving:</label>
        <input type="text" id="text" name="text">
    <br>
    <label for="category">Categorie:</label>
    <label for="category">Categorie:</label>
    <select name="categories[]" id="category" multiple required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                @if(isset($product) && $product->categories->contains($category->id)) selected @endif>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <br>
    <button type="submit">Opslaan</button>
</form>
    @else
        <p>Je moet ingelogd zijn om een product aan te maken.</p>
    @endauth
    <p>This is the content for the page.</p>
@endsection 