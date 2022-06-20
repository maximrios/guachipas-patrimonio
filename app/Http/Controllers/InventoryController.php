<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Barryvdh\DomPDF\PDF;
use App\Models\Inventory;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorPNG;

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
        $inventories = Inventory::selectRaw('inventories.id, CONCAT("MATRICULA N°: ", inventories.registration, " - ", products.name) as text')
            ->join('products', 'inventories.product_id', 'products.id')
            ->where('registration', 'like', '%'.$request->term.'%')->orderBy('products.name')->get();
        return response()->json(['status' => 200, 'results' => $inventories]);
    }

    public function check(Request $request)
    {
        $inventory = Inventory::where('registration', $request->input('registration'))->first();
        $product = $inventory->product;
        return response()->json(['status' => 200, 'data' => $inventory, 'product' => $product]);
    }
}
