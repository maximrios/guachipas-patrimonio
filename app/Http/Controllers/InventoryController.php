<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Barryvdh\DomPDF\PDF;
use App\Models\Inventory;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Picqer\Barcode\BarcodeGeneratorPNG;
use App\Http\Resources\InventoryResource;
use App\Http\Resources\InventoryCollection;
use App\Services\Inventory\InventoryExportService;
use App\Services\Inventory\GetInventoryDataTableService;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $inventories = Inventory::all();
        return view('inventories.index')->with('inventories', $inventories);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }

    public function print() {
        $inventories = Inventory::all();
        $date = Carbon::today();

        foreach($inventories as $inventory) {
            $inventory->orderProduct = OrderProduct::where('order_id', $inventory->order_id)->where('product_id', $inventory->product_id)->first();
        }

        $data = [
            'inventories' => $inventories,
            'date' => $date,
        ];

        $pdf = \PDF::loadView('inventories.print', $data)->setPaper('A4', 'landscape');

        return $pdf->stream('archivo.pdf');
    }

    public function code(Inventory $inventory)
    {
        $code = $inventory->product->nomenclator.''.$inventory->registration;
        $generatorPNG = new BarcodeGeneratorPNG;
        $barcode = base64_encode($generatorPNG->getBarcode($code, $generatorPNG::TYPE_CODE_128));

        $data = [
            'inventory' => $inventory,
            'code' => $code,
            'barcode' => $barcode,
        ];

        $pdf = \PDF::loadView('inventories.code', $data)->setPaper('A4', 'portrait');

        return $pdf->stream('etiquetas.pdf');
    }

    public function list(Request $request)
    {

        $inventories = (new GetInventoryDataTableService(
            $request->get('start'),
            $request->get('length'),
            $request->get('term'),
            $request->get('draw')
        ))->execute();

        return $inventories;

    }

    public function check(Request $request)
    {
        $inventory = Inventory::where('registration', $request->input('registration'))->first();
        $product = $inventory->product;
        return response()->json(['status' => 200, 'data' => $inventory, 'product' => $product]);
    }

    public function order(Order $order)
    {

        $inventories = Inventory::where('order_id', $order->id)->get();
        $data = [];
        foreach($inventories as $inventory) {

            $code = $inventory->product->nomenclator.''.$inventory->registration;
            $generatorPNG = new BarcodeGeneratorPNG;
            $barcode = base64_encode($generatorPNG->getBarcode($code, $generatorPNG::TYPE_CODE_128));

            $data['inventories'][] = [
                //'inventory' => $inventory,
                'code' => $code,
                'barcode' => $barcode,
            ];

        }

        $pdf = \PDF::loadView('inventories.order', $data)->setPaper('A4', 'portrait');

        return $pdf->stream('etiquetas.pdf');
    }

    public function export(Request $request)
    {
        $organization_id = $request->input('organization_id');
        return (new InventoryExportService($organization_id))->execute();
    }

}
