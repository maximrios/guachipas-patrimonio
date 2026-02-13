<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Area;
use App\Models\Order;
use App\Models\Provider;
use Barryvdh\DomPDF\PDF;
use App\Models\Inventory;
use App\Models\OrderProduct;
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
     * Show the blank form to select registration type.
     *
     * @return \Illuminate\Http\Response
     */
    public function blank()
    {
        return view('orders.blank');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderByDesc('year')
            ->orderByDesc('id')
            ->get();

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
        $areas = Area::all();
        $providers = Provider::all();
        return view('orders.create')
            ->with('providers', $providers)
            ->with('areas', $areas);
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
        return view('orders.show')
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
        $areas = Area::all();
        return view('orders.edit')
            ->with('order', $order)
            ->with('areas', $areas);
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
            return redirect(route('orders.show', [$order]))->with([
                'message' => 'Alta patrimonial actualizada correctamente.',
                'type' => 'success',
            ]);;
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
        ini_set('memory_limit', '512M');
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

    public function confirm(Order $order)
    {
        $order->status_id = Order::STATUS_CONFIRMED;
        $order->save();
        
        return redirect(route('orders.show', [$order->id]))->with([
            'message' => 'Se confirmó el alta correctamente.',
            'type' => 'success',
        ]);
    }

    public function approve(Order $order)
    {
        $products = $order->products()->get();
        //TODO if one organization
        //$lastRegistration = Inventory::where('organization_id', $order->organization_id)->orderBy('id', 'desc')->value('registration');
        $lastRegistration = Inventory::orderBy('registration', 'desc')->value('registration');
        $registration = ($lastRegistration) ? $lastRegistration : 1;
        $productId = 0;
        foreach ($products as $product) {
            //$registration = $product->registration_from;
            for ($i = 1; $i <= $product->quantity; $i++) {
                $inventory = new Inventory();
                $inventory->order_product_id = $product->id;
                $inventory->product_id = $product->product_id;
                $inventory->description = $product->description;
                $inventory->area_id = $order->area_id;
                $inventory->registration = $registration + 1;
                $inventory->order_id = $order->id;
                $inventory->sale_id = 0;
                $inventory->status_id = $product->order_product_status_id;
                $inventory->save();

                if ($productId != $product->id) {
                    $product->registration_from = $registration + 1;
                    if ($product->quantity == 1) {
                        $product->registration_to = $product->registration_from + 1;
                    }
                    $productId = $product->id;
                    $product->save();
                } else {
                    $product->registration_to = $registration + 1;
                    $product->save();
                }
                $registration++;
            }
        }
        $order->generated_at = date('Y-m-d H:i:s');
        $order->status_id = Order::STATUS_APPROVED;
        $order->save();
        return redirect(route('orders.show', [$order->id]))->with([
            'message' => 'Se aprobó el alta correctamente.',
            'type' => 'success',
        ]);
    }

    public function export(Request $request)
    {
        $from = $request->input('date_from');
        $to = $request->input('date_to');
        $area_id = $request->input('area_id');

        return (new OrderExportService($from, $to, $area_id))->execute();
    }
}
