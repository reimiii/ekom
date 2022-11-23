<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
    }

    public function create()
    {
    }

    public function store(Request $request, Product $product)
    {
        $product->carts()->updateOrCreate([
            'user_id' => $request->user()->id,
            'product_id' => $product->id,
        ], [
            'price' => $product->price,
        ]);

        cache()->forget('charts_global_count');

        return back();
    }

    public function show(Cart $cart)
    {
    }

    public function edit(Cart $cart)
    {
    }

    public function update(Request $request, Cart $cart)
    {
    }

    public function destroy(Cart $cart)
    {
    }
}