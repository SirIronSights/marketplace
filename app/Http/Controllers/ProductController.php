<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        $products = Product::with('categories')->get();
        return view('products.index', compact('products'));
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
        $product->description = $validated['text'];

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
}
