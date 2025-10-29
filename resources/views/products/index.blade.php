@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

<h1>Products</h1>

<table>
    <thead>
        <tr>
            <th>Naam</th>
            <th>Beschrijving</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->title }}</td>
            <td>{{ $product->text }}</td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}">Bewerken</a>
            </td>
            <td>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Verwijderen</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

    <p>This is the content for the page.</p>
@endsection