<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderProductRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use App\Models\OrderProductOrigin;
use App\Models\OrderProductStatus;
use App\Models\Product;

class OrderProductController extends Controller
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
    public function create(Order $order)
    {
        $statuses = OrderProductStatus::all();
        $origins = OrderProductOrigin::all();
        $products = Product::all();
        return view('orderProducts.create')
            ->with('order', $order)
            ->with('products', $products)
            ->with('statuses', $statuses)
            ->with('origins', $origins);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderProductRequest $request)
    {
        $orderProduct = new OrderProduct($request->validated());
        $orderProduct->save();
        if($orderProduct) {
            return redirect(route('orders.show', [$orderProduct->order_id]));
        }
        else {
            return redirect(route('orders.index'))->with([
                'message' => 'Ocurrio un error al registrar la orden',
                'type' => 'danger',
            ]);    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderProducts  $orderProducts
     * @return \Illuminate\Http\Response
     */
    public function show(OrderProduct $orderProducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderProducts  $orderProducts
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderProduct $orderProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderProducts  $orderProducts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderProduct $orderProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderProducts  $orderProducts
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderProduct $orderProduct)
    {
        $orderProduct->delete();
        return redirect(route('orders.show', ['order' => $orderProduct->order_id]))->with([
            'message' => 'Se elimino el registro correctamente',
            'type' => 'success',
        ]);
    }
}
