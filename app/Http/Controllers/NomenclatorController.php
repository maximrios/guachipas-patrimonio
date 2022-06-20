<?php

namespace App\Http\Controllers;

use App\Models\Nomenclator;
use Illuminate\Http\Request;

class NomenclatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nomenclators = Nomenclator::all();
        return view('nomenclators.index')->with('nomenclators', $nomenclators);
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
     * @param  \App\Models\Nomenclator  $nomenclator
     * @return \Illuminate\Http\Response
     */
    public function show(Nomenclator $nomenclator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nomenclator  $nomenclator
     * @return \Illuminate\Http\Response
     */
    public function edit(Nomenclator $nomenclator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nomenclator  $nomenclator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nomenclator $nomenclator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nomenclator  $nomenclator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nomenclator $nomenclator)
    {
        //
    }
}
