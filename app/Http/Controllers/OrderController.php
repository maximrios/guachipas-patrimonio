<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Barryvdh\DomPDF\PDF;
use App\Models\Inventory;
use App\Models\OrderProduct;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Exporters\OrderExport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Services\Order\OrderExportService;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->get();
        return view('orders.index')
            ->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organizations = Organization::all();
        return view('orders.create')
            ->with('organizations', $organizations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $order = new Order($request->validated());
        $order->save();
        if($order) {
            return redirect(route('orders.show', ['order' => $order]));
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $products = $order->products()->get();
        return view('orders.detail')
            ->with('order', $order)
            ->with('products', $products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $organizations = Organization::all();
        return view('orders.edit')
            ->with('order', $order)
            ->with('organizations', $organizations);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->validated());
        if($order) {
            return redirect(route('orders.index', [$order->id]));
        }
        else {
            return redirect(route('orders.index'))->with([
                'message' => 'Ocurrio un error al registrar la orden',
                'type' => 'danger',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect(route('orders.index'))->with([
            'message' => 'Se elimino la orden correctamente',
            'type' => 'success',
        ]);
    }

    public function print(Order $order)
    {
        $products = $order->products()->get();

        $date = Carbon::today();
        $date->locale(); //con esto revise que el lenguaje fuera es

        $logo = base64_encode(file_get_contents(public_path('/img/logo.png')));

        $data = [
            'order' => $order,
            'products' => $products,
            'logo' => $logo,
        ];

        $pdf = \PDF::loadView('orders.print', $data)->setPaper('A4', 'landscape');

        return $pdf->stream('archivo.pdf');
    }

    public function approve(Order $order)
    {
        $products = $order->products()->get();
        //TODO if one organization
        $lastRegistration = Inventory::where('organization_id', $order->organization_id)->orderBy('id', 'desc')->value('registration');
        $registration = ($lastRegistration) ? $lastRegistration:1;
        foreach($products as $product) {
            //$registration = $product->registration_from;
            for($i=1; $i<= $product->quantity; $i++) {
                $inventory = new Inventory();
                $inventory->product_id = $product->product_id;
                $inventory->description = $product->description;
                $inventory->organization_id = $order->organization_id;
                $inventory->registration = $registration++;
                $inventory->order_id = $order->id;
                $inventory->sale_id = 0;
                $inventory->current_organization = $order->organization_id;
                $inventory->status_id = $product->order_product_status_id;
                $inventory->save();
            }
        }
        $order->generated_at = date('Y-m-d H:i:s');
        $order->status_id = 2;
        $order->save();
        return redirect(route('orders.show', [$order->id]));
    }

    public function export(Request $request)
    {
        $from = $request->input('date_from');
        $to = $request->input('date_to');
        $organization_id = $request->input('organization_id');


        return (new OrderExportService($from, $to, $organization_id))->execute();
    }
}
