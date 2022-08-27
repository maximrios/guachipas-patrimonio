<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Assignment;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAssignmentRequest;
use App\Models\Inventory;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignments = Assignment::all();
        return view('assignments.index')->with('assignments', $assignments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organizations = Organization::all();
        return view('assignments.create')
            ->with('organizations', $organizations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssignmentRequest $request)
    {
        $assignment = new Assignment($request->validated());
        $assignment->save();
        if($assignment) {
            return redirect(route('assignments.show', ['assignment' => $assignment]));
        }
        else {
            return redirect(route('assignments.index'))->with([
                'message' => 'Ocurrio un error al registrar la orden',
                'type' => 'danger',
            ]);    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        $products = $assignment->products;
        return view('assignments.detail')
            ->with('assignment', $assignment)
            ->with('products', $products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        //
    }

    public function print(Assignment $assignment)
    {
        $products = $assignment->products()->get();
        
        $date = Carbon::today();
        $date->locale(); //con esto revise que el lenguaje fuera es 

        $logo = base64_encode(file_get_contents(public_path('/img/logo.png')));

        $data = [
            'assignment' => $assignment,
            'products' => $products,
            'logo' => $logo,
        ];
    
        $pdf = \PDF::loadView('assignments.print', $data)->setPaper('A4', 'portrait');
    
        return $pdf->stream('archivo.pdf');
    }

    public function approve(Assignment $assignment)
    {
        $products = $assignment->products;
        
        foreach($products as $product) {
            if($product->inventory_id) {
                $inventory = Inventory::find($product->inventory_id);
                $inventory->organization_id = $assignment->organization_id;
                $inventory->current_organization = $assignment->organization_id;
                $inventory->save();
            }
        }
        $assignment->approved_at = date('Y-m-d H:i:s');
        $assignment->save();

        return redirect(route('assignments.show', [$assignment]));
    }
}
