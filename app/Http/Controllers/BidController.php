<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidController extends Controller
{
    public function create(Product $product)
    {
        return view('bids.create', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'amount' => ['required', 'numeric', 'min:0.01'],
        ]);

        Bid::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'amount' => $request->amount,
        ]);

        return redirect()->route('products.index')->with('success', 'Bod geplaatst!');
    }
}
