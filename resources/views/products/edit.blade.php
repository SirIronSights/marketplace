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
    <textarea id="text" name="text">{{ $product->text }}</textarea>
    <br>
    <button type="submit">Bijwerken</button>
</form>
@section('content')
    <p>This is the content for the page.</p>
@endsection