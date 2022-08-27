<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderProductRequest;
use App\Http\Requests\UpdateOrderProductRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\OrderProductFound;
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
        $founds = OrderProductFound::all();
        $statuses = OrderProductStatus::all();
        $origins = OrderProductOrigin::all();
        $products = Product::all();
        return view('orderProducts.create')
            ->with('order', $order)
            ->with('products', $products)
            ->with('statuses', $statuses)
            ->with('origins', $origins)
            ->with('founds', $founds);
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
            if($request->input('continue')){
                $order = Order::findOrFail($orderProduct->order_id);
                return redirect(route('orderProducts.create', ['order' => $order]));
            }
            else {
                return redirect(route('orders.show', [$orderProduct->order_id]));
            }
                
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
     * @param  \App\Models\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderProduct $orderProduct)
    {
        $order = $orderProduct->order;
        $founds = OrderProductFound::all();
        $statuses = OrderProductStatus::all();
        $origins = OrderProductOrigin::all();
        $products = Product::all();

        return view('orderProducts.edit')
            ->with('order', $order)
            ->with('products', $products)
            ->with('statuses', $statuses)
            ->with('origins', $origins)
            ->with('founds', $founds)
            ->with('orderProduct', $orderProduct);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderProducts  $orderProducts
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderProductRequest $request, OrderProduct $orderProduct)
    {
        $orderProduct->update($request->validated());
        return redirect(route('orders.show', [$orderProduct->order_id]));
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
