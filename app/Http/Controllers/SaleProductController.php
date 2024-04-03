<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaleProductRequest;
use App\Models\Sale;
use App\Models\Product;
use App\Models\SaleProduct;
use Illuminate\Http\Request;

class SaleProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Sale $sale)
    {
        $products = Product::all();
        return view('saleProducts.create')
            ->with('sale', $sale)
            ->with('products', $products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaleProductRequest $request)
    {
        $saleProduct = new SaleProduct($request->validated());
        $saleProduct->save();
        if ($saleProduct) {
            return redirect(route('orders.show', [$saleProduct->sale_id]))->with([
                'message' => 'Se dio de baja el bien correctamente.',
                'type' => 'success',
            ]);
        } else {
            return redirect(route('orders.index'))->with([
                'message' => 'Ocurrio un error al registrar la baja',
                'type' => 'danger',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SaleProduct  $saleProduct
     * @return \Illuminate\Http\Response
     */
    public function show(SaleProduct $saleProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaleProduct  $saleProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleProduct $saleProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SaleProduct  $saleProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleProduct $saleProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaleProduct  $saleProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleProduct $saleProduct)
    {
        //
    }
}
