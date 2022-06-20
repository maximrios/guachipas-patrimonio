@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Bajas patrimoniales <small></small></h3>
    </div>
    <div class="title_right">
        <a href="{{ url('sales/create') }}" class="btn btn-primary pull-right">Nueva baja</a>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Bajas patrimoniales</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Número</th>
                                <th>Ejercicio</th>
                                <th>Institución</th>
                                <th>Unidad Organizacional</th>
                                <th>Expediente</th>
                                <th>Fecha de emisión</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sales as $sale)
                                <tr>
                                    <td>{{ $sale->id }}</td>
                                    <td>{{ $sale->year }}</td>
                                    <td>{{ $sale->institution }}</td>
                                    <td>
                                        <strong>Hospital San Bernardo</strong><br>
                                        {{ $sale->organization_name }}
                                    </td>
                                    <td>{{ $sale->file }}</td>
                                    <td>{{ $sale->generated_at }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('sales.print', ['sale' => $sale])}}" target="_blank">Imprimir</a>
                                        <a class="btn btn-info" href="{{ route('sales.show', ['sale' => $sale->id])}}">Detalle</a>
                                        <a class="btn btn-warning" href="{{ route('sales.edit', ['sale' => $sale->id])}}">Editar</a>
                                        <form method="POST" action="{{ route('sales.destroy', ['sale' => $sale->id]) }}" style="display:inline-block;">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-delete" data-message="Está por eliminar la baja # {{ $sale->id }}. Desea continuar?">Eliminar</button>
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
</div>
<script>
    $(function() {
        $('.table').dataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json'
            }
        });
    })
    
</script>
@endsection