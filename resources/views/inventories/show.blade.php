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
        <div class="col-md-8">
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
                                    
                                </div>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <div>
                                    <strong>Alta patrimonial N°:</strong> 
                                    <a href="{{ route('orders.show', $inventory->order) }}">{{ $inventory->order->number }}/{{ $inventory->order->year }}</a>
                                    <br><b>Expediente:</b> {{ $inventory->order->file }}<br>
                                    <b>Fecha de alta:</b> {{ $inventory->order->created_at->format('d/m/Y') }}<br>
                                </div>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <b>Estado:</b> <span class="badge badge-{{$inventory->status->slug}}">{{ $inventory->status->name }}</span><br>
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
                        <br>
                        <div class="row">
                            <div class="col-sm-12">
                                <b>Descripción</b><br>
                                {{ $inventory->description }}
                            </div>
                        </div>
                        @if ($inventory->observations)
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
            <x-card>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="350px">Area</th>
                            <th>Observaciones</th>
                            <th width="140px">Fecha asignación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($inventory->assignments as $assignment)
                        <tr>
                            <td>
                                {{ $assignment->area?->name }}
                            </td>
                            <td>{{ $assignment->observation }}</td>
                            <td>{{ $assignment->created_at->format('d/m/Y H:i:s') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No hay movimientos registrados</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </x-card>
        </div>
        <div class="col-md-4">
            <x-card>
            <a href="#" data-toggle="modal" data-target="#uploadDocumentModal" class="btn btn-sm btn-primary">
                                <i class="fa fa-plus"></i> Subir Documento
                            </a>
            </x-card>
            <x-card>
            
            
                    <div id="documents-list">
                        @if($inventory->documents->count() > 0)
                        <table class="table table-striped" id="documents-table">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Nombre</th>
                                    <th>Tamaño</th>
                                    <th>Fecha</th>
                                    <th width="120px">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inventory->documents as $document)
                                <tr id="document-row-{{ $document->id }}">
                                    <td>
                                        <span class="badge badge-info">{{ $document->documentType->name }}</span>
                                    </td>
                                    <td>
                                        @if($document->isImage())
                                            <i class="fa fa-file-image-o"></i>
                                        @elseif($document->isPdf())
                                            <i class="fa fa-file-pdf-o"></i>
                                        @else
                                            <i class="fa fa-file-o"></i>
                                        @endif
                                        {{ $document->original_name }}
                                    </td>
                                    <td>{{ $document->size_formatted }}</td>
                                    <td>{{ $document->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('documents.download', $document) }}" class="btn btn-xs btn-info" title="Descargar">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        @if($document->isImage() || $document->isPdf())
                                        <a href="{{ asset('storage/' . $document->file_path) }}" class="btn btn-xs btn-default" target="_blank" title="Ver">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @endif
                                        <button type="button" class="btn btn-xs btn-danger btn-delete-document" data-id="{{ $document->id }}" title="Eliminar">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <x-empty-state 
                                icon="fa fa-file"
                                title="No hay documentos"
                                description="No hay documentos cargados para este inventario."
                            />
                        @endif
                    </div>
                
            </x-card>
        </div>
    </div>
</div>

<!-- Modal Subir Documento -->
<div id="uploadDocumentModal" class="modal fade" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-upload-document" method="post" enctype="multipart/form-data" action="{{ route('documents.store') }}">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-upload"></i> Subir Documento</h4>
                </div>
                <div class="modal-body">
                    <div id="upload-message"></div>
                    <div class="form-group">
                        <label>Tipo de documento <span class="text-danger">*</span></label>
                        <select name="document_type_id" class="form-control" required>
                            <option value="">Seleccione...</option>
                            @foreach($documentTypes as $documentType)
                            <option value="{{ $documentType->id }}"
                                    data-max-size="{{ $documentType->max_size_mb }}"
                                    data-mime-types="{{ implode(',', $documentType->allowed_mime_types ?? []) }}">
                                {{ $documentType->name }}
                                @if($documentType->is_required) * @endif
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Archivo <span class="text-danger">*</span></label>
                        <input type="file" name="file" class="form-control" required>
                        <small class="text-muted" id="file-requirements"></small>
                    </div>
                    <input type="hidden" name="documentable_id" value="{{ $inventory->id }}">
                    <input type="hidden" name="documentable_type" value="App\Models\Inventory">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btn-upload-document" class="btn btn-primary">
                        <i class="fa fa-upload"></i> Subir
                    </button>
                </div>
            </form>
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

        // Mostrar requisitos del tipo de documento
        $('select[name="document_type_id"]').on('change', function() {
            var selected = $(this).find(':selected');
            var maxSize = selected.data('max-size');
            var mimeTypes = selected.data('mime-types');

            if (maxSize) {
                var requirements = 'Tamaño máximo: ' + maxSize + ' MB';
                if (mimeTypes) {
                    requirements += ' | Tipos permitidos: ' + mimeTypes.replace(/,/g, ', ');
                }
                $('#file-requirements').text(requirements);
            } else {
                $('#file-requirements').text('');
            }
        });

        // Subir documento
        $('#form-upload-document').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            var btn = $('#btn-upload-document');

            btn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Subiendo...');

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#uploadDocumentModal').modal('hide');
                    window.location.reload();
                },
                error: function(xhr) {
                    var message = xhr.responseJSON?.message || 'Error al subir el documento';
                    $('#upload-message').html('<div class="alert alert-danger">' + message + '</div>');
                    btn.prop('disabled', false).html('<i class="fa fa-upload"></i> Subir');
                }
            });
        });

        // Eliminar documento
        $(document).on('click', '.btn-delete-document', function() {
            var documentId = $(this).data('id');

            if (!confirm('¿Está seguro de eliminar este documento?')) {
                return;
            }

            $.ajax({
                url: '/documents/' + documentId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#document-row-' + documentId).fadeOut(function() {
                        $(this).remove();
                        if ($('#documents-table tbody tr').length === 0) {
                            window.location.reload();
                        }
                    });
                },
                error: function() {
                    alert('Error al eliminar el documento');
                }
            });
        });

        // Limpiar modal al cerrar
        $('#uploadDocumentModal').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset();
            $('#upload-message').html('');
            $('#file-requirements').text('');
        });
    });
</script>
@endsection