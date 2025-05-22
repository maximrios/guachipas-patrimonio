@extends('layouts.app')

@section('content')
<style>
    .table label {
        margin-bottom: 0!important;
    }
    .dataTables_filter {
  display: none;
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
                <div class="row">
                    <div class="col-sm-2">
                        <label for="product-search">Matrícula</label>
                        <input type="text" id="product-search" class="form-control" placeholder="Buscar...">
                    </div>
                    <div class="col-sm-3">
                        <label for="inventory-search">Inventario</label>
                        <input type="text" id="inventory-search" class="form-control" placeholder="Buscar...">
                    </div>
                    <div class="col-sm-5">
                        <label for="area-search">Area</label>
                        <select id="area-search" class="form-control">
                            <option value="">Todas</option>
                            @foreach ($areas as $area)
                                <option value="{{ $area->name }}">{{ $area->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="filtro-status">Disponibilidad</label>
                        <select id="filtro-status" class="form-control">
                            <option value="">Todos</option>
                            <option value="Disponible">Disponible</option>
                            <option value="No disponible">No disponible</option>
                        </select>
                    </div>
                </div>
                
                <table id="table-inventories" class="table table-striped">
                    <thead>
                        <tr>
                            <th width="100px">Matrícula N°</th>
                            <th>Nombre</th>
                            <th>Area</th>
                            <th width="90px">Disponibilidad</th>
                            <th width="90px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventories as $inventory)
                            <tr>
                                <td>{{ $inventory->registration }}</td>
                                <td>
                                    <strong>{{ $inventory->product->nomenclator }}</strong><br>
                                    {{ $inventory->product->name }}<br>
                                    <span class="badge badge-{{$inventory->status->slug }}">
                                        {{ $inventory->status->name }}
                                    </span>
                                </td>
                                <td>
                                    @if ($inventory->area)
                                        <strong>{{ $inventory->area?->name }} - {{ $inventory->area->responsible?->profile?->full_name }}</strong><br>
                                        
                                        {{ $inventory->employee?->profile?->full_name }}
                                    @else
                                        {{ $inventory->organization->name }}    
                                    @endif
                                </td>
                                <td>
                                    @if ($inventory->available == 1)
                                        <span class="label label-success">Disponible</span>
                                    @else
                                        <span class="label label-warning">No disponible</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('inventories.show', ['inventory' => $inventory]) }}" class="btn btn-primary btn-sm">&nbsp;Ver detalle</a>
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
    
$( document ).ready(function() {
    var table = $('.table').DataTable({
        dom: 'frtip',
        //searching: false,
    });
    $('.dataTables_filter').hide();

    $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
        
        const statusSeleccionado = $('#filtro-status').val()?.trim();
        const inventory = $('#inventory-search').val()?.toLowerCase().trim();
        const area = $('#area-search').val()?.toLowerCase().trim();

        const statusFila = data[3]?.trim();         // ajustá índice según el orden de tus columnas
        const inventoryFila = data[1]?.toLowerCase().trim();  // idem
        const areaFila = data[2]?.toLowerCase().trim();  // idem

        const pasaFiltroStatus = !statusSeleccionado || statusFila === statusSeleccionado;
        const pasaFiltroInventory = !inventory || inventoryFila.includes(inventory);
        const pasaFiltroArea = !area || areaFila.includes(area);

        return pasaFiltroStatus && pasaFiltroInventory && pasaFiltroArea;
        
    });

    // 2) Al cambiar el select, redibujamos la tabla
    $('#filtro-status').on('change', function() {
        table.draw();
    });

    $('#inventory-search').on('keyup', function() {
        table.draw();
    });

    $('#product-search').on('keyup', function() {
        table.columns(0).search(this.value).draw();
    });

    $('#area-search').on('change', function() {
        table.draw();
    });
});

</script>
@endsection

@endsection
