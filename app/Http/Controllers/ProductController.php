<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index() : View
    {
        return view('products.index', [
            'products' => Product::latest()->paginate(4)
        ]);
    }

    public function create() : View
    {
        return view('products.create');
    }


    public function store(StoreProductRequest $request) : RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('imageurl')) {
            $filePath = Storage::disk('public')->putFile('file-uploads', $request->file('imageurl'));
            $filePath = Storage::url($filePath);
            $data['imageurl'] =  $filePath;+




            
        }

        Product::create($data);

        return redirect()->route('products.index')
        ->withSuccess('New product created successfully.');
    }


    public function show(Product $product) : View
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product) : View
    {
        return view('products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product) : RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('imageurl')) {
            $filePath = Storage::disk('public')->putFile('file-uploads', $request->file('imageurl'));
            $filePath = Storage::url($filePath);
            $data['imageurl'] =  $filePath;
        }

        $product->update($data);

        return redirect()->back()
        ->withSuccess('Products is updated successfully.');
    }

    public function destroy(Product $product) : RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')
        ->withSuccess('Product is deleted successfully.');
    }   
}
