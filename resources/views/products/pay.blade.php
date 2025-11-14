@extends('layouts.app')

@section('content')
<h1>Promote: {{ $product->title }}</h1>

<p>You can “pay” here to promote this advertisement. No real transaction is made.</p>

<form action="{{ route('products.pay.complete', $product->id) }}" method="POST">
    @csrf
    <button type="submit" 
            style="padding:10px 20px; background:green; color:white; border:none; border-radius:5px;">
        Complete Promotion
    </button>
</form>
@endsection