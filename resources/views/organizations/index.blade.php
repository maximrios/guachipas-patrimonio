@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>{{ $parent->name }}</h3>
    </div>
    <div class="title_right">
        <a href="{{ route('organizations.show', [$parent->parent_id]) }}" class="btn btn-default pull-right">Volver</a>
        <a href="{{ route('organizations.create', [$parent->id]) }}" class="btn btn-primary pull-right">Nueva unidad organizacional</a>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Unidades organizacionales</h2>
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
                        @foreach ($organizations as $organization)
                            <tr>
                                <td>{{ $organization->code }}</td>
                                <td>{{ $organization->name }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('organizations.show', ['organization' => $organization->id])}}">Dependencias</a>
                                    <a class="btn btn-warning btn-sm" href="{{ route('organizations.edit', ['organization' => $organization->id])}}">Editar</a>
                                    <form method="POST" action="{{ route('organizations.destroy', ['organization' => $organization]) }}">
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