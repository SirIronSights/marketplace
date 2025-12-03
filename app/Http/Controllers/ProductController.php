<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories =Category::all();
        
        $query = Product::with(['categories', 'user', 'bids' => function($q){
            $q->orderByDesc('amount');
        }, 'bids.user'])->orderByDesc('is_premium')->orderByDesc('created_at');

        if ($request->has('categories')) {
            $categoryIds = $request->input('categories');
            $query->whereHas('categories', function ($q) use ($categoryIds) {
                $q->whereIn('categories.id', $categoryIds);
            });
        }

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                ->orWhere('text', 'like', "%{$search}%");
            });
        }
        $products = $query->paginate(10)->withQueryString();
        
        return view('products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();
        $product = new Product();

        $product->title = $validated['title'];
        $product->text = $validated['text'];
        $product->user_id = Auth::id();

        $product->save();

        $product->categories()->attach($validated['categories']);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product) {
        $validated = $request->validated();

        $product->title = $validated['title'];
        $product->text = $validated['text'];

        $product->save();

        $product->categories()->sync($validated['categories']);

        return redirect()->route('products.index', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product )
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function myProducts()
    {
        $user = Auth::user();
        $products = Product::where('user_id', $user->id)
            ->with('categories')
            ->get();

        return view('products.my', compact('products'));
    }

    public function payPage(Product $product)
    {
        return view('products.pay', compact('product'));
    }

    public function completePayment(Product $product)
    {
        $product->is_premium = true;
        $product->save();

        return redirect()
            ->route('products.my')
            ->with('success', 'Transaction complete — the article is now premium!');
    }
}
