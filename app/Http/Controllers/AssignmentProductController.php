<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\AssignmentProduct;
use App\Models\Inventory;
use Illuminate\Http\Request;

class AssignmentProductController extends Controller
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
    public function create(Assignment $assignment)
    {
        return view('assignmentProducts.create')
            ->with('assignment', $assignment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function untracked(Assignment $assignment)
    {
        return view('assignmentProducts.untracked')
            ->with('assignment', $assignment);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $assignmentProduct = new AssignmentProduct();
        $assignmentProduct->name = $request->input('name');
        $assignmentProduct->quantity = $request->input('quantity');
        $assignmentProduct->assignment_id = $request->input('assignment_id');
        $assignmentProduct->save();

        return response()->json(['assignmentProduct' => $assignmentProduct]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeInventory(Request $request)
    {
        $inventory = Inventory::findOrFail($request->product_id);

        $assignmentProduct = new AssignmentProduct();
        $assignmentProduct->inventory_id = $inventory->id;
        $assignmentProduct->registration = $inventory->registration;
        $assignmentProduct->name = $inventory->product->name;
        $assignmentProduct->quantity = 1;
        $assignmentProduct->assignment_id = $request->input('assignment_id');
        $assignmentProduct->save();

        return response()->json(['assignmentProduct' => $assignmentProduct]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssignmentProduct  $assignmentProduct
     * @return \Illuminate\Http\Response
     */
    public function show(AssignmentProduct $assignmentProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssignmentProduct  $assignmentProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(AssignmentProduct $assignmentProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssignmentProduct  $assignmentProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssignmentProduct $assignmentProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssignmentProduct  $assignmentProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignmentProduct $assignmentProduct)
    {
        $assignmentProduct->delete();
        $assignment = Assignment::findOrFail($assignmentProduct->assignment_id);
        return redirect(route('assignments.show', $assignment))->with([
            'message' => 'Se elimino la orden correctamente',
            'type' => 'success',
        ]);
    }
}
