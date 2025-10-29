<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users', function () { return view('users.index'); })->name('users.index');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', function () {return view('users.create');})->name('users.create');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/{id}', function () {})->name('users.show');
Route::get('/users/{id}/edit', function () {})->name('users.edit');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', function () {})->name('users.update');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/products', function () { return view('products.index'); })->name('products.index');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', function () {return view('products.create');})->name('products.create');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', function () {})->name('products.store');
Route::get('/products/{id}', function () {})->name('products.show');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', function () {})->name('products.update');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/categories', function () { return view('categories.index'); })->name('categories.index');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', function () {return view('categories.create');})->name('categories.create');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', function () {})->name('categories.store');
Route::get('/categories/{id}', function () {})->name('categories.show');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', function () {})->name('categories.update');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// We voegen ook een redirect toe aan de routes die de hoofdpagina doorverwijst naar de '/items' route
Route::redirect('/', '/users');

Route::get('/', function () {
    return view('welcome');
});
