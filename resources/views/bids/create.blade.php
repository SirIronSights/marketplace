@extends('layouts.app')

@section('title', 'Plaats een Bod')

@section('content')
<h1>Plaats een Bod op: {{ $product->title }}</h1>

<form action="{{ route('bids.store', $product->id) }}" method="POST" style="max-width:400px;">
    @csrf
    <label for="amount">Bedrag:</label>
    <input type="number" step="0.01" min="0.01" id="amount" name="amount" required class="form-control" style="margin-bottom:10px;">

    <button type="submit" style="
        background-color:#4CAF50;
        color:white;
        padding:8px 16px;
        border:none;
        border-radius:5px;
        cursor:pointer;
    ">Plaats Bod</button>
</form>
@endsection