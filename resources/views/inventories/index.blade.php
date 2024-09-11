@extends('layouts.app')

@section('content')
<style>
    .table label {
        margin-bottom: 0!important;
    }
</style>

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
                <table id="" class="table table-striped">
                    <thead>
                        <tr>
                            <th width="100px">Matrícula N°</th>
                            <th>Nombre</th>
                            <th>Sector</th>
                            <th width="90px">Estado</th>
                            <th width="90px"></th>
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
                                <td>
                                    <span class="badge badge-{{$inventory->status->slug }}">
                                        {{ $inventory->status->name }}
                                    </span>
                                </td>
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

@section('scripts')
<script>
    /*
$( document ).ready(function() {
    $('.table').dataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: "{{ route('inventories.list') }}",
        dataType: 'json',
        type: 'GET',
        columns: [{
                data: 'registration',
                name: 'registration',
            },
            {
                data: 'product',
                name: 'product',
            },
            {
                data: 'organization',
                name: 'organization',
            },
            {
                data: 'status',
                name: 'status',
            },
        ],
        columnDefs: [
            {
                render: function (data, type, row) {
                    return '<label>' + data + '</label><br><span>' + row.description + '</span>';
                },
                targets: 1,
            },
            {
                render: function (data, type, row) {
                    return `<span class="label label-info">${data}</label>`;
                },
                targets: 3,
            },
        ],
    });
});
*/

</script>
@endsection

@endsection
