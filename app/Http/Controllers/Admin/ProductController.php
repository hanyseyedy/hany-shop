<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    public function create()
    {
        return view('admin.create_edit_product');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::create($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/products');
                $product->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        return view('admin.create_edit_product', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product->update($data);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/products');
                $product->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
