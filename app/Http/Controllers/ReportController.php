<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProviderRequest;
use App\Http\Requests\UpdateProviderRequest;
use App\Models\Area;
use App\Models\Organization;
use App\Models\Provider;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$providers = Provider::orderBy('id', 'DESC')->get();
        $areas = Area::all();
        return view('reports.index')
            ->with('areas', $areas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('providers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProviderRequest $request)
    {
        $provider = new Provider($request->validated());
        $provider->save();
        if($provider) {
            return redirect(route('providers.index', [$provider->id]));
        }
        else {
            return redirect(route('providers.index'))->with([
                'message' => 'Ocurrio un error al registrar el proveedor',
                'type' => 'danger',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        return view('providers.edit')
            ->with('provider', $provider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProviderRequest $request, Provider $provider)
    {
        $provider->update($request->validated());
        if($provider) {
            return redirect(route('providers.index', [$provider->id]));
        }
        else {
            return redirect(route('providers.index'))->with([
                'message' => 'Ocurrio un error al registrar la orden',
                'type' => 'danger',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect(route('providers.index', ['provider' => $provider->id]))->with([
            'message' => 'Se elimino el registro correctamente',
            'type' => 'success',
        ]);
    }
}
