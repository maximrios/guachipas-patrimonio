@extends('layouts.app')

@section('content')
<style>
    .table label {
        margin-bottom: 0!important;
    }
    .dataTables_filter {
        display: none;
    }
    .filter-section {
        margin-bottom: 15px;
    }
    .filter-section label {
        font-weight: bold;
    }
    .attributes-accordion .panel {
        border: none;
        box-shadow: none;
        margin: 0;
    }
    .attributes-accordion .panel-heading {
        padding: 0;
        border: none;
        background: none;
    }
    .attributes-accordion .panel-title a {
        display: block;
        padding: 10px 15px;
        background: #f8f8f8;
        border: 1px solid #ddd;
        border-radius: 4px;
        text-decoration: none;
        color: #333;
    }
    .attributes-accordion .panel-title a:hover {
        background: #f0f0f0;
    }
    .attributes-accordion .panel-body {
        padding: 15px;
        border: 1px solid #ddd;
        border-top: none;
        border-radius: 0 0 4px 4px;
    }
    .attributes-search {
        margin-bottom: 15px;
    }
    .attribute-group {
        margin-bottom: 20px;
    }
    .attribute-chip {
        display: inline-block;
        padding: 5px 10px;
        margin: 2px;
        background: #f0f0f0;
        border-radius: 15px;
        cursor: pointer;
    }
    .attribute-chip.active {
        background: #2A3F54;
        color: white;
    }
    .active-filters {
        margin: 10px 0;
        padding: 10px;
        background: #f8f8f8;
        border-radius: 4px;
    }
    .active-filter {
        display: inline-block;
        padding: 5px 25px 5px 10px;
        margin: 2px;
        background: #2A3F54;
        color: white;
        border-radius: 15px;
        position: relative;
    }
    .active-filter .remove-filter {
        position: absolute;
        right: 8px;
        top: 50%;
        transform: translateY(-50%);
        color: white;
        cursor: pointer;
    }
    #attributes-modal .modal-body {
        max-height: 500px;
        overflow-y: auto;
    }
</style>

<div class="page-title">
    <div class="title_left">
        <h3>Inventario custom<small></small></h3>
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
                <h2>Filtros Aplicados</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-3">
                        <div class="filter-section">
                            <label for="product-search">Matrícula</label>
                            <input type="text" id="product-search" class="form-control" placeholder="Buscar por matrícula...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="filter-section">
                            <label for="inventory-search">Inventario</label>
                            <input type="text" id="inventory-search" class="form-control" placeholder="Buscar por nombre...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="filter-section">
                            <label for="area-search">Area</label>
                            <select id="area-search" class="form-control">
                                <option value="">Todas</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->name }}">{{ $area->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="filter-section">
                            <label for="filtro-status">Disponibilidad</label>
                            <select id="filtro-status" class="form-control">
                                <option value="">Todos</option>
                                <option value="Disponible">Disponible</option>
                                <option value="No disponible">No disponible</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#attributes-modal">
                            <i class="fa fa-filter"></i> Filtrar por Atributos
                        </button>
                        <div class="active-filters">
                            <h4>Filtros Activos</h4>
                            <div id="active-filters-container">
                                <!-- Los filtros activos se mostrarán aquí dinámicamente -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Inventario</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="table-inventories" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Area</th>
                            <th>Atributos</th>
                            <th width="90px">Estado</th>
                            <th width="90px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventories as $inventory)
                            <tr>
                                <td>
                                    <strong>{{ $inventory->registration }}</strong><br>
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
                                    @foreach($inventory->attributeValues as $value)
                                        <div data-attribute-id="{{ $value->attribute->id }}">
                                            <strong>{{ $value->attribute->name }}:</strong> {{ $value->value }}<br>
                                        </div>
                                    @endforeach
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

<!-- Modal de Atributos -->
<div class="modal fade" id="attributes-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Filtrar por Atributos</h4>
            </div>
            <div class="modal-body">
                <div class="attributes-search">
                    <input type="text" class="form-control" id="attribute-search" placeholder="Buscar atributos...">
                </div>
                
                <div class="attributes-accordion panel-group" id="attributes-accordion">
                    @php
                        $attributesByType = $attributes->groupBy('type');
                    @endphp

                    @foreach($attributesByType as $type => $typeAttributes)
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#attributes-accordion" href="#collapse-{{ $type }}">
                                    {{ ucfirst($type) }}
                                </a>
                            </h4>
                        </div>
                        <div id="collapse-{{ $type }}" class="panel-collapse collapse">
                            <div class="panel-body">
                                @foreach($typeAttributes as $attribute)
                                <div class="attribute-filter-container" data-attribute-id="{{ $attribute->id }}">
                                    <label>{{ $attribute->name }}</label>
                                    <input type="text" class="form-control attribute-filter" 
                                           id="attribute-{{ $attribute->id }}"
                                           data-attribute-id="{{ $attribute->id }}"
                                           data-attribute-name="{{ $attribute->name }}"
                                           placeholder="Filtrar por {{ strtolower($attribute->name) }}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="apply-filters">Aplicar Filtros</button>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
$(document).ready(function() {
    var table = $('.table').DataTable({
        dom: 'frtip',
        pageLength: 25,
        order: [[0, 'asc']]
    });
    $('.dataTables_filter').hide();

    // Objeto para almacenar los filtros activos
    var activeFilters = {};

    // Función para actualizar los filtros activos visuales
    function updateActiveFiltersDisplay() {
        var container = $('#active-filters-container');
        container.empty();
        
        Object.keys(activeFilters).forEach(function(attributeId) {
            if (activeFilters[attributeId].value) {
                var filterHtml = `
                    <div class="active-filter" data-attribute-id="${attributeId}">
                        ${activeFilters[attributeId].name}: ${activeFilters[attributeId].value}
                        <span class="remove-filter">&times;</span>
                    </div>
                `;
                container.append(filterHtml);
            }
        });
    }

    // Función para obtener el valor de un atributo de un elemento
    function getAttributeValue(row, attributeId) {
        var value = '';
        $(row).find('td:eq(3) div').each(function() {
            if ($(this).data('attribute-id') == attributeId) {
                value = $(this).text().split(':')[1].trim();
            }
        });
        return value.toLowerCase();
    }

    // Búsqueda de atributos en el modal
    $('#attribute-search').on('keyup', function() {
        var searchTerm = $(this).val().toLowerCase();
        $('.attribute-filter-container').each(function() {
            var attributeName = $(this).find('label').text().toLowerCase();
            if (attributeName.includes(searchTerm)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

    // Extensión de búsqueda personalizada
    $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
        var row = table.row(dataIndex).node();
        
        // Filtros básicos
        const statusSeleccionado = $('#filtro-status').val()?.trim();
        const inventory = $('#inventory-search').val()?.toLowerCase().trim();
        const area = $('#area-search').val()?.toLowerCase().trim();

        const statusFila = data[4]?.trim();
        const inventoryFila = data[1]?.toLowerCase().trim();
        const areaFila = data[2]?.toLowerCase().trim();

        const pasaFiltroStatus = !statusSeleccionado || statusFila === statusSeleccionado;
        const pasaFiltroInventory = !inventory || inventoryFila.includes(inventory);
        const pasaFiltroArea = !area || areaFila.includes(area);

        // Filtros de atributos
        let pasaFiltrosAtributos = true;
        Object.keys(activeFilters).forEach(function(attributeId) {
            if (activeFilters[attributeId].value) {
                var attributeValue = getAttributeValue(row, attributeId);
                if (!attributeValue.includes(activeFilters[attributeId].value.toLowerCase())) {
                    pasaFiltrosAtributos = false;
                }
            }
        });

        return pasaFiltroStatus && pasaFiltroInventory && pasaFiltroArea && pasaFiltrosAtributos;
    });

    // Event listeners para filtros básicos
    $('#filtro-status, #area-search').on('change', function() {
        table.draw();
    });

    $('#inventory-search, #product-search').on('keyup', function() {
        table.draw();
    });

    $('#product-search').on('keyup', function() {
        table.columns(0).search(this.value).draw();
    });

    // Manejo de filtros de atributos
    $('#apply-filters').click(function() {
        $('.attribute-filter').each(function() {
            var attributeId = $(this).data('attribute-id');
            var value = $(this).val();
            var name = $(this).data('attribute-name');
            
            if (value) {
                activeFilters[attributeId] = {
                    value: value,
                    name: name
                };
            } else {
                delete activeFilters[attributeId];
            }
        });
        
        updateActiveFiltersDisplay();
        table.draw();
        $('#attributes-modal').modal('hide');
    });

    // Eliminar filtros individuales
    $(document).on('click', '.remove-filter', function(e) {
        e.stopPropagation();
        var attributeId = $(this).parent().data('attribute-id');
        delete activeFilters[attributeId];
        $(`#attribute-${attributeId}`).val('');
        updateActiveFiltersDisplay();
        table.draw();
    });

    // Mostrar el primer grupo de atributos por defecto
    $('.panel-collapse').first().addClass('in');
});
</script>
@endsection

@endsection
