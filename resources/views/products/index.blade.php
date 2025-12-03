@extends('layouts.app')

@section('title', 'Page Title')

@section('content')

<h1>Products</h1>

<form method="GET" action="{{ route('products.index') }}" style="margin-bottom: 15px;">
    <input type="text" name="search" placeholder="Search products..."
           value="{{ request('search') }}"
           style="padding: 5px; width: 250px;">
    <button type="submit">Zoek</button>

    @if(request('search'))
        <a href="{{ route('products.index') }}" style="margin-left: 10px;">Reset</a>
    @endif
</form>

<button id="toggleFilter" style="margin-bottom: 10px;">
    Show Filters
</button>

<div id="filterMenu">
    <form method="GET" action="{{ route('products.index') }}">
        <div>
            <strong>Filter by category:</strong><br>
            @foreach($categories as $category)
                <label>
                    <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                        {{ in_array($category->id, request()->input('categories', [])) ? 'checked' : '' }}>
                    {{ $category->name }}
                </label>
            @endforeach
        </div>
        <br>
        <button type="submit">Filter</button>
        <a href="{{ route('products.index') }}">
            <button type="button">Reset</button>
        </a>
    </form>
</div>

<table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
    <thead>
        <tr>
            <th>Naam</th>
            <th>Beschrijving</th>
            <th>Categorieën</th>
            <th>Aanbieder</th>
            <th>Biedingen</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->title }}</td>
            <td>{{ $product->text }}</td>
            <td>{{ $product->categories->pluck('name')->join(', ') }}</td>
            <td>{{ $product->user->username }}</td>
            
            
            <td>
                @if($product->bids->count() > 0)
                    <strong>Hoogste bod:</strong> €{{ number_format($product->bids->max('amount'), 2) }}<br>
                    <ul style="margin-top: 5px; padding-left: 15px;">
                        @foreach($product->bids->sortByDesc('amount') as $bid)
                            <li>
                                €{{ number_format($bid->amount, 2) }} 
                                door <strong>{{ $bid->user->username }}</strong>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <em>Geen biedingen</em>
                @endif
            </td>

            <td>
                <a href="{{ route('products.edit', $product->id) }}">Bewerken</a><br>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="margin-top:5px;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Verwijderen</button>
                </form>

                @auth
                    <a href="{{ route('bids.create', $product->id) }}" 
                       style="display: inline-block; margin-top: 5px;">Plaats bod</a>
                @endauth
            </td>
        </tr>
        @endforeach
    </tbody>
    <div style="margin-top: 20px;">
    {{ $products->links() }}
    </div>
    <style>
        nav[role="navigation"] {
            font-size: 14px;
        }
        nav[role="navigation"] svg {
            width: 1em;
            height: 1em;
        }

        nav[role="navigation"] .px-4 {
            padding-left: 5px !important;
            padding-right: 5px !important;
        }
    </style>
</table>
<script>
    document.getElementById('toggleFilter').addEventListener('click', function() {
        const menu = document.getElementById('filterMenu');
        const isVisible = menu.style.display === 'block';
        menu.style.display = isVisible ? 'none' : 'block';
        this.textContent = isVisible ? '🔍 laat filters zien' : '✖ klap filters in';
    });
</script>
@endsection