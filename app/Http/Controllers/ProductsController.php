<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductSingleResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query()
            ->with(['category'])
            ->when($request->category, fn($q, $v) => $q->whereBelongsTo(Category::where('slug', $v)->first()))
            ->select('id', 'name', 'slug', 'price', 'picture', 'category_id')
            ->paginate(12)
            ->withQueryString();

//        return ProductResource::collection($products);
        return inertia('Products/Index', [
            'products' => ProductResource::collection($products),
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Product $product)
    {

        return inertia('Products/Show', [
            'product' => ProductSingleResource::make($product->load('category'))
        ]);
    }

    public function edit(Product $product)
    {
    }

    public function update(Request $request, Product $product)
    {
    }

    public function destroy(Product $product)
    {
    }
}