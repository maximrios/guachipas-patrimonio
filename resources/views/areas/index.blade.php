@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>{{ $parent->name }}</h3>
    </div>
    <div class="title_right">
        <a href="{{ route('areas.show', [$parent->parent_id]) }}" class="btn btn-default pull-right">Volver</a>
        <a href="{{ route('areas.create', [$parent->id]) }}" class="btn btn-primary pull-right">Nueva area</a>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Areas</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="150">Centro de Costos</th>
                            <th>Nombre</th>
                            <th width="260"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($areas as $area)
                            <tr>
                                <td>{{ $area->code }}</td>
                                <td>{{ $area->name }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('areas.show', ['area' => $area->id])}}">Dependencias</a>
                                    <a class="btn btn-warning btn-sm" href="{{ route('areas.edit', ['area' => $area->id])}}">Editar</a>
                                    <form method="POST" action="{{ route('areas.destroy', ['area' => $area]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm btn-delete" data-message="¿Esta por eliminar el registro. Desea continuar?" >
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
