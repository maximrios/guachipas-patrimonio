@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Inventario <small></small></h3>
    </div>
    <div class="title_right">
        <!--<a href="{{ url('inventories/print') }}" class="btn btn-primary pull-right" target="_blank">Imprimir</a>&nbsp;-->
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Inventario</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="90px">Matrícula N°</th>
                            <th>Nombre</th>
                            <th>Sector</th>
                            <th width="70px">Estado</th>
                            <th width="120px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventories as $inventory)
                            <tr>
                                <td>{{ $inventory->registration }}</td>
                                <td>
                                    <strong>{{ $inventory->product->nomenclator }}</strong><br>
                                    {{ $inventory->product->name }}
                                </td>
                                <td>{{ $inventory->organization->name }}</td>
                                <td>{{ $inventory->status->name }}</td>
                                <td>
                                    <a href="{{ route('inventories.code', ['inventory' => $inventory]) }}" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-barcode"></i>&nbsp;Imprimir etiquetas</a>
                                </td>
                            </tr>    
                        @endforeach
                    </tbody>
                </table>
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
