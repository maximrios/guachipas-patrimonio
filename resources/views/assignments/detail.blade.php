@extends('layouts.app')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Altas patrimoniales</h3>
        </div>
        <div class="title_right">
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Planilla de Alta <small></small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <section class="content invoice">
                        <div class="row">
                            <div class="invoice-header">
                                <h1>
                                    <i class="fa fa-globe"></i> Planilla de Asignacion N° {{ $assignment->id }}
                                </h1>
                            </div>
                        </div>
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <div>
                                    <strong>Dirigido a: </strong><span>{{ $assignment->assign_to }}</span>
                                    <br>
                                    <strong>Area: </strong><span>{{ $assignment->area->name }}</span>
                                </div>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <div>
                                    
                                </div>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <b>Fecha:</b> {{ $assignment->created_at }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                @if($products->count() > 0 && !$assignment->approved_at)
                                    <a href="{{ route('assignments.approve', ['assignment' => $assignment]) }}" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-check"></i> Confirmar asignacion</a>
                                @endif
                                <a href="{{ url('assignments') }}" class="btn btn-default">Volver</a>
                                <a href="{{ route('assignments.print', ['assignment' => $assignment]) }}" class="btn btn-default pull-right" style="margin-right: 5px;" target="_blank"><i class="fa fa-print"></i> Ver planilla de asignación</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                @if(!$assignment->approved_at)
                                    <a id="addInventory" href="{{ route('assignmentProducts.create', [$assignment]) }}" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal">Agregar inventario</a>
                                    
                                    <a id="addProducto" href="{{ route('assignmentProducts.untracked', [$assignment]) }}" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalInventory">Agregar no registrable</a>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Bien</th>
                                            <th width="75" class="text-center">Cantidad</th>
                                            @if(!$assignment->approved_at)
                                                <th width="75px"></th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    @if ($product->registration)
                                                        <strong>{{ $product->registration }}</strong><br>    
                                                    @endif
                                                    <span>{{ $product->name }}</span>
                                                </td>
                                                <td class="text-center">
                                                    {{ $product->quantity }}
                                                </td>
                                                @if(!$assignment->approved_at)
                                                    <td>
                                                        <form action="{{ route('assignmentProducts.destroy', ['assignmentProduct' => $product]) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm btn-delete" data-message="Está por eliminar el registro. Desea continuar?">Eliminar</button>
                                                        </form>        
                                                    </td>
                                                @endif
                                            </tr>    
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal" class="modal fade" data-keyboard="false">
	<div class="modal-dialog">
    	<div class="modal-content"></div>
    </div>
</div>
<div id="modalInventory" class="modal fade" data-keyboard="false">
	<div class="modal-dialog">
    	<div class="modal-content"></div>
    </div>
</div>
<script>
    /* $(document).ready(function() {
        $('#addInventory').click(function(event){
            event.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html'
            }).done(function(data){
                alert(data);
                $('#notificationModal').html(data);
                $("#notificationModal").modal("show");
            }); 
        });
    }); */
</script>
@endsection
