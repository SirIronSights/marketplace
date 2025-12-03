@extends('layouts.app')

@section('content')
<h1>Promote: {{ $product->title }}</h1>

<p>complete transaction</p>

<form action="{{ route('products.pay.complete', $product->id) }}" method="POST">
    @csrf
    <button type="submit" 
            style="padding:10px 20px; background:green; color:white; border:none; border-radius:5px;">
        complete promotion
    </button>
</form>
@endsection