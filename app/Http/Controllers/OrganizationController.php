<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrganizationRequest;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizations = Organization::all();
        return view('organizations.index')
            ->with('organizations', $organizations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organizations = Organization::all();
        return view('organizations.create')
            ->with('organizations', $organizations);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrganizationRequest $request)
    {
        $organization = new Organization($request->validated());
        $organization->save();
        if($organization) {
            return redirect(route('organizations.index', [$organization->id]));
        }
        else {
            return redirect(route('organizations.index'))->with([
                'message' => 'Ocurrio un error al registrar la unidad organizacional',
                'type' => 'danger',
            ]);    
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        return view('organizations.edit')
            ->with('organization', $organization);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
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
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        $organization->delete();
        return redirect(route('organizations.index', ['organization' => $organization->id]))->with([
            'message' => 'Se elimino el registro correctamente',
            'type' => 'success',
        ]);
    }
}
