<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productAttributes = ProductAttribute::all();
        return view('productAttributes.index')->with('productAttributes', $productAttributes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->input('attributes', []);
        $productId = $request->input('product_id');

        //sync attributes to the product
        if (empty($attributes) || empty($productId)) {
            return redirect()->back()->with('error', 'Product ID and attributes are required.');
        }

        $product = Product::find($productId);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $product->attributes()->sync($attributes);
        
        return redirect()->route('products.show', $productId)
            ->with('success', 'Product attributes updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductAttribute $productAttribute)
    {
        $productAttribute->delete();
        return redirect()->route('products.show', $productAttribute->product_id)
            ->with('success', 'Product attribute deleted successfully.');
    }

    public function get(Request $request)
    {
        $product = Product::find($request->id);
        dd($product);
        return response()->json(['status' => 200, 'results' => $product]);

        //$products = Product::where('name', 'like', '%'.$request->term.'%')->get();
        //return response()->json(['status' => 200, 'results' => $products]);
    }

    public function list(Request $request) 
    {
        //$products = Product::selectRaw('id, name as text,')->where('name', 'like', '%'.$request->term.'%')->orderBy('name')->get();
        $products = Product::where('name', 'like', '%'.$request->term.'%')->get();
        return response()->json(['status' => 200, 'results' => $products]);
    }
}
