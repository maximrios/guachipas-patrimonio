<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAreaRequest;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($parent_id = 1)
    {
        $area_id = $parent_id ?? 1;
        $parent = Area::findOrFail($area_id);
        $areas = $parent->children;
        return view('areas.index')
            ->with('parent', $parent)
            ->with('areas', $areas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Area $area)
    {
        $parent = $area;
        return view('areas.create')
            ->with('parent', $parent);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAreaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAreaRequest $request)
    {
        $area = new Area($request->validated());
        $area->save();
        if($area) {
            return redirect(route('areas.show', ['area' => $area->parent_id]));
        }
        else {
            return redirect(route('areas.index'))->with([
                'message' => 'Ocurrio un error al registrar el area',
                'type' => 'danger',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        $parent = $area;
        $areas = $parent->children;
        return view('areas.index')
            ->with('parent', $parent)
            ->with('areas', $areas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        return view('areas.edit')
            ->with('area', $area);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        $area->code = $request->input('code');
        $area->name = $request->input('name');
        $area->save();
        if($area) {
            return redirect(route('areas.index', [$area->id]));
        }
        else {
            return redirect(route('areas.index'))->with([
                'message' => 'Ocurrio un error al actualizar el area',
                'type' => 'danger',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $area->delete();
        return redirect(route('areas.index', ['area' => $area->id]))->with([
            'message' => 'Se elimino el registro correctamente',
            'type' => 'success',
        ]);
    }
}
