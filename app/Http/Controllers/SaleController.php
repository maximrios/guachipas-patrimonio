<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Sale;
use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSaleRequest;
use App\Models\Inventory;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::orderBy('created_at', 'DESC')->get();
        return view('sales.index')
            ->with('sales', $sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        return view('sales.create')
            ->with('areas', $areas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaleRequest $request)
    {
        $sale = new Sale($request->validated());
        $sale->save();
        if($sale) {
            return redirect(route('sales.index', [$sale->id]));
        }
        else {
            return redirect(route('sales.index'))->with([
                'message' => 'Ocurrio un error al registrar la baja',
                'type' => 'danger',
            ]);    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        $products = $sale->products()->get();
        return view('sales.detail')
            ->with('sale', $sale)
            ->with('products', $products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect(route('sales.index'))->with([
            'message' => 'Se elimino la baja correctamente',
            'type' => 'success',
        ]);
    }

    public function print(Sale $sale)
    {
        $date = Carbon::today();
        $date->locale(); //con esto revise que el lenguaje fuera es 

        $logo = base64_encode(file_get_contents(public_path('/img/logo.png')));

        $products = $sale->products()->get();
        $data = [
            'sale' => $sale,
            'products' => $products,
            'date' => $date,
            'logo' => $logo,
        ];
    
        $pdf = \PDF::loadView('sales.print', $data)->setPaper('a4', 'landscape');
    
        return $pdf->stream('archivo.pdf');
    }

    public function approve(Sale $sale)
    {
        $products = $sale->products()->get();
        foreach ($products as $product) {
            $inventory = Inventory::where('id', $product->inventory_id)->first();
            $inventory->delete();
        }
        $sale->generated_at = date('Y-m-d H:i:s');
        $sale->status_id = 2;
        $sale->save();
        return redirect(route('sales.show', [$sale->id]))->with([
            'message' => 'Se confirmó la baja correctamente.',
            'type' => 'success',
        ]);
    }
}
