@extends('layouts.app')

@section('content')
<div class="">
    @if(session('message'))
    <div class="alert alert-{{ session('type') }} show" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_content">

                    <section class="content invoice">
                        <div class="row">
                            <div class="invoice-header">
                                <h1>
                                    <i class="fa fa-globe"></i> Matrícula N° {{ $inventory->registration }}
                                </h1>
                            </div>
                        </div>
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <div>
                                    @if ($inventory->area)
                                        @foreach ($inventory->area?->ancestors as $ancestor)
                                            <strong>{{ $ancestor->name }}</strong><br>
                                        @endforeach
                                        <br>
                                    @else
                                        Area: <strong>Sin asignación</strong><br>
                                    @endif
                                    
                                    @if ($inventory->employee)
                                        <strong>Agente: </strong><span>{{ $inventory->employee->profile->full_name }}</span>
                                    @else
                                        Agente: <strong>Sin asignación</strong><br>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <div>
                                    <strong>Alta patrimonial N°:</strong> 
                                    <a href="{{ route('orders.show', $inventory->order) }}">{{ $inventory->order->number }}/{{ $inventory->order->year }}</a>
                                    <br><b>Expediente:</b> {{ $inventory->order->file }}<br>
                                    <b>Fecha de alta:</b> {{ $inventory->order->created_at }}
                                </div>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <b>Estado:</b> <span class="badge badge-{{$inventory->status->slug}}">{{ $inventory->status->name }}</span><br>
                                <b>Disponibilidad:</b> <span class="badge badge-success">{{ $inventory->available ? 'Disponible':'No disponible' }}</span><br>
                            </div>
                        </div>

                        @if ($inventory->provider)
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <b>Proveedor</b><br>
                                <strong>Razón social: </strong> {{ $inventory->provider->name }}<br>
                                <strong>Teléfono:</strong> {{ $inventory->provider->phone }}<br>
                                <strong>Domicilio:</strong>{{ $inventory->provider->address }}<br>
                                <strong>Email:</strong>{{ $inventory->provider->email }}
                            </div>
                        </div>
                        <br>
                        @endif

                        <div class="row">
                            <div class="col-sm-12">
                                <b>Nomenclador patrimonial</b><br>
                                {{ $inventory->product->nomenclator }} -
                                {{ $inventory->product->name }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <b>Descripción</b><br>
                                {{ $inventory->description }}
                            </div>
                        </div>
                        @if ($inventory->observations && 1==2)
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <b>Observaciones</b><br>
                                {{ $inventory->observations }}
                            </div>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-sm-12">
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="{{ url('orders') }}" class="btn btn-default">Volver</a>
                                @if (auth()->user()->hasRole('admin'))
                                    <a id="addAttributes" href="#" class="btn btn-default pull-right" data-toggle="modal" data-target="#attributes">Especificaciones</a>
                                @endif
                                <a id="addProducto" href="#" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal">Asignar inventario</a>

                                <a href="{{ route('inventories.edit', $inventory) }}" class="btn btn-warning pull-right" style="margin-right: 5px;" target="_self"><i class="fa fa-pencil"></i> Editar</a>

                                <a href="{{ route('inventories.code', $inventory) }}" class="btn btn-primary pull-right" style="margin-right: 5px;" target="_blank"><i class="fa fa-barcode"></i> Imprimir etiquetas</a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_content">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Area</th>
                                <th>Agente</th>
                                <th>Observaciones</th>
                                <th width="140px">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($inventory->assignments as $assignment)
                            <tr>
                                <td>
                                    {{ $assignment->area?->name }}
                                </td>
                                <td>
                                    {{ $assignment->employee?->profile->full_name }}
                                </td>
                                <td>{{ $assignment->observation }}</td>
                                <td>{{ $assignment->created_at }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">No hay movimientos registrados</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="attributes" class="modal fade" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content" id="guest-modal">
            <form id="form-untracked" method="post" role="form" action="{{ route('productAttributeValues.store') }}">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="margin-top:0px!important;">Especificaciones</h4>
                </div>
                <div class="modal-body">
                    <div id="message"></div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Atributo</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventory->product->attributes as $attribute)
                                <tr>
                                    <td>{{ $attribute->name }}</td>
                                    <td>
                                        <input type="text"
                                            class="form-control"
                                            name="attribute[{{ $attribute->id }}]"
                                            value="{{ $inventory->attributeValues->where('attribute_id', $attribute->id)->first()?->value }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="inventory_id" value="{{ $inventory->id }}">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" id="addSpecification" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modal" class="modal fade" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content" id="guest-modal">
            <form id="form-assignment" method="post" role="form" action="{{ route('assignmentProducts.storeInventory') }}">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="margin-top:0px!important;">Asignar inventario</h4>
                </div>
                <div class="modal-body">
                    <div id="message"></div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label>Area</label><br>
                            <select id="area_id" name="area_id" class="form-control select" style="width: 100%;">
                                <option value="">Seleccione</option>
                                @foreach ($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Agente</label><br>
                            <select id="employee_id" name="employee_id" class="form-control select" style="width: 100%;">
                                <option value="">Seleccione</option>
                                @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->profile->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Observación</label><br>
                            <textarea id="observation" name="observation" class="form-control"></textarea>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="inventory_id" value="{{ $inventory->id }}">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" id="addInventory" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
        <script>
            /*
            $(document).ready(function() {
                OrderProduct.addForm();
                $('#product_id').select2({
                    language: "es",
                    minimumInputLength: 3,
                    minimumResultsForSearch: 20,
                    ajax: {
                        url: "{{ route('inventories.search') }}",
                        dataType: 'json',
                        // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                    }
                });


            });
            //$('#addInventory').on('click', function(event) {
            $(document).on('click', '#addInventory', function(event) {
                event.preventDefault()
                let form = $(this).closest('form')[0]
                var formData = new FormData(document.getElementById('form-untracked'));
                $.ajax({
                    url: form.action,
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#modal').hide();
                        window.location.reload();
                    }
                })
            });
            */
        </script>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.select').select2();

        $('#addInventory').on('click', function(event) {
            event.preventDefault()
            let form = $(this).closest('form')[0]
            var formData = new FormData(document.getElementById('form-assignment'));
            $.ajax({
                url: form.action,
                type: 'POST',
                data: formData,
                dataType: 'json',
                processData: false, 
                contentType: false,
                success: function(response) {
                    $('#modal').hide();
                    window.location.reload();
                }
            })
        });

        $('#addSpecification').on('click', function(event) {
            event.preventDefault()
            let form = $(this).closest('form')[0]
            var formData = new FormData(document.getElementById('form-untracked'));
            $.ajax({
                url: form.action,
                type: 'POST',
                data: formData,
                dataType: 'json',
                processData: false, 
                contentType: false,
                success: function(response) {
                    $('#modal').hide();
                    window.location.reload();
                }
            })
        });
    });
</script>
@endsection