<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\PDF;
use App\Models\Inventory;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Picqer\Barcode\BarcodeGeneratorPNG;
use App\Http\Resources\InventoryResource;
use App\Http\Resources\InventoryCollection;
use App\Models\Area;
use App\Models\Employee;
use App\Models\OrderProductStatus;
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
        $areas = Area::all();
        return view('inventories.index')
            ->with('areas', $areas)
            ->with('inventories', $inventories);
    }

    public function custom()
    {
        $inventories = Inventory::with(['product.attributes', 'attributeValues', 'area', 'employee'])->get();
        $areas = Area::all();
        $attributes = \App\Models\Attribute::with('products')->get();
        
        return view('inventories.custom')
            ->with('areas', $areas)
            ->with('attributes', $attributes)
            ->with('inventories', $inventories);
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
        $assignments = $inventory->assignments()->get();
        $order = $inventory->order;
        $areas = Area::all();
        $employees = Employee::all();

        return view('inventories.show')
            ->with('inventory', $inventory)
            ->with('order', $order)
            ->with('areas', $areas)
            ->with('assignments', $assignments)
            ->with('employees', $employees);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        $statuses = OrderProductStatus::all();
        return view('inventories.edit')
            ->with('inventory', $inventory)
            ->with('statuses', $statuses);
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
        $inventory->status_id = $request->input('status_id');
        $inventory->observations = $request->input('observations');
        $inventory->available = $request->input('available');
        if ($request->input('available') == 1) {
            $inventory->employee_id = null;
        }

        $inventory->save();

        return redirect(route('inventories.show', $inventory))->with([
            'message' => 'Inventario actualizado correctamente',
            'type' => 'success',
        ]);
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

    public function print()
    {
        $inventories = Inventory::all();
        $date = Carbon::today();

        foreach ($inventories as $inventory) {
            $inventory->orderProduct = OrderProduct::where('order_id', $inventory->order_id)->where('product_id', $inventory->product_id)->first();
        }

        $data = [
            'inventories' => $inventories,
            'date' => $date,
        ];

        $pdf = \PDF::loadView('inventories.print', $data)->setPaper('A4', 'landscape');

        return $pdf->stream('archivo.pdf');
    }

    public function codeAll(Request $request)
    {
        $offset = $request->has('offset') ? $request->get('offset') : 0;
        $limit = $request->has('limit') ? $request->get('limit') : 24;
        $inventories = Inventory::offset($offset)->limit($limit)->get();
        $products = [];
        foreach($inventories as $inventory) {
            $code = $inventory->product->nomenclator . '' . $inventory->registration;
            $generatorPNG = new BarcodeGeneratorPNG;
            $barcode = base64_encode($generatorPNG->getBarcode($code, $generatorPNG::TYPE_CODE_128));
    
            $scale = 2;     // Escala horizontal, aumenta el ancho
            $height = 40;   // Altura de las barras
    
            $barcode = base64_encode(
                $generatorPNG->getBarcode($code, $generatorPNG::TYPE_CODE_128, $scale, $height)
            );
    
            $products[$inventory->id]['code'] = $code;
            $products[$inventory->id]['barcode'] = $barcode;
        }

        $data = [
            'inventories' => $products
        ];
//dd($data);
        $pdf = \PDF::loadView('inventories.code_all', $data)->setPaper('A4', 'portrait');

        return $pdf->stream('etiquetas.pdf');
    }

    public function code(Inventory $inventory)
    {
        $code = $inventory->product->nomenclator . '' . $inventory->registration;
        $generatorPNG = new BarcodeGeneratorPNG;
        $barcode = base64_encode($generatorPNG->getBarcode($code, $generatorPNG::TYPE_CODE_128));

        $scale = 2;     // Escala horizontal, aumenta el ancho
        $height = 51;   // Altura de las barras

        $barcode = base64_encode(
            $generatorPNG->getBarcode($code, $generatorPNG::TYPE_CODE_128, $scale, $height)
        );

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
        foreach ($inventories as $inventory) {
            $code = $inventory->product->nomenclator . '' . $inventory->registration;
            $generatorPNG = new BarcodeGeneratorPNG();
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
        $area_id = $request->input('area_id');
        return (new InventoryExportService($area_id))->execute();
    }

    public function get(Request $request)
    {
        $inventory = Inventory::find($request->id);
        return response()->json(['status' => 200, 'data' => new InventoryResource($inventory)]);
    }

    public function search(Request $request)
    {
        /*$inventories = Inventory::selectRaw('id, name as text')
            ->where('registration', 'like', '%' . $request->term . '%')
            ->orWhereHas('product', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->term . '%');
            })
            ->get();
*/
        $inventories = Inventory::query()
            ->select(DB::raw("CONCAT('Matricula N°: ', inventories.registration, ' - ', products.name) AS text, inventories.id as id"))
            ->leftJoin('products', 'inventories.product_id', '=', 'products.id') // Join con la tabla de productos
            ->where('inventories.registration', 'like', '%' . $request->term . '%')
            ->orWhere('products.name', 'like', '%' . $request->term . '%')
            ->get();
        return response()->json(['status' => 200, 'results' => $inventories]);
    }
}
