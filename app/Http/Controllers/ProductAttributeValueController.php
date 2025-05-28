<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeValue;
use Illuminate\Http\Request;

class ProductAttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productAttributeValues = ProductAttributeValue::all();
        return view('productAttributeValues.index')->with('productAttributeValues', $productAttributeValues);
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
        $inventoryId = $request->input('inventory_id');
        $attributeInputs = $request->input('attribute', []);

        foreach ($attributeInputs as $attributeId => $inputValue) {
            $attribute = Attribute::find($attributeId);

            if (!$attribute) continue;

            // if ($attribute->options->isNotEmpty()) {
            //     $option = $attribute->options->firstWhere('id', $inputValue);

            //     ProductAttributeValue::updateOrCreate(
            //         [
            //             'inventory_id' => $inventoryId,
            //             'product_attribute_id' => $attributeId
            //         ],
            //         [
            //             'value' => $option?->value ?? null,
            //             'product_attribute_option_id' => $option?->id
            //         ]
            //     );
            // } else {
                // Texto libre o número
                ProductAttributeValue::updateOrCreate(
                    [
                        'inventory_id' => $inventoryId,
                        'attribute_id' => $attributeId
                    ],
                    [
                        'value' => $inputValue,
                        'attribute_option_id' => null
                    ]
                );
            //}
        }
        return response()->json(['status' => 200, 'message' => 'Atributos actualizados correctamente.']);
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
