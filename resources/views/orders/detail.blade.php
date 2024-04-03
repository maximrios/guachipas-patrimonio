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
                    @if(session('message'))
                        <div class="alert alert-{{ session('type') }} show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <section class="content invoice">
                        <div class="row">
                            <div class="invoice-header">
                                <h1>
                                    <i class="fa fa-globe"></i> Planilla de Alta N° {{ $order->number }} / {{ $order->year }}
                                </h1>
                            </div>
                        </div>
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <div>
                                    <strong>Carácter: </strong><span>{{ $order->character }}</span>
                                    <br>
                                    <strong>Institución: </strong><span>{{ $order->institution }}</span>
                                    <br>
                                    <strong>Jurisdicción: </strong><span>{{ $order->organization_name }}</span>
                                    <br>
                                    <strong>Unid. de Organización: </strong><span>{{ $order->organization->name }}</span>
                                </div>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <div>
                                    <strong>Expediente</strong>
                                    <br><b>N°:</b> {{ $order->file }}
                                </div>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <b>Planilla #{{ $order->number }}</b>
                                <br>
                                <b>Estado:</b> {{ $order->status->name }}
                                <br>
                                <b>Fecha:</b> {{ $order->created_at }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="{{ url('orders') }}" class="btn btn-default">Volver</a>
                                @if($products->count() > 0 && $order->status_id === 2)
                                    <a href="{{ route('inventories.order', ['order' => $order]) }}" class="btn btn-primary pull-right" style="margin-right: 5px;" target="_blank"><i class="fa fa-barcode"></i> Imprimir etiquetas</a>
                                @endif
                                @if($products->count() > 0 && $order->status_id === 1)
                                    <a href="{{ route('orders.approve', ['order' => $order]) }}" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-check"></i> Confirmar planilla</a>
                                @endif
                                <a href="{{ route('orders.print', ['order' => $order]) }}" class="btn btn-default pull-right" style="margin-right: 5px;" target="_blank"><i class="fa fa-print"></i> Ver planilla de alta</a>

                                <a href="{{ route('orders.edit', ['order' => $order]) }}" class="btn btn-warning pull-right" style="margin-right: 5px;"><i class="fa fa-pencil"></i> Editar</a>

                                @if($order->status_id === 1)
                                    <form method="POST" action="{{ route('orders.destroy', ['order' => $order->id]) }}" style="display:inline;">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-delete pull-right" data-message="Está por eliminar la orden # {{ $order->id }}. Desea continuar?"><i class="fa fa-trash-o"></i> Eliminar</button>
                                    </form>
                                @endif
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <hr>
                            </div>
                        </div>
                        @if($order->status_id === 1)
                            <div class="row">
                                <div class="col-sm-12">
                                    <a id="addProducto" href="{{ route('orderProducts.create', [$order]) }}" class="btn btn-primary pull-right" data-target=".bs-example-modal-lg">Agregar registro</a>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th width="100px" class="text-center">Cantidad</th>
                                            <th width="120px">Matrícula desde</th>
                                            <th width="120px">Matrícula hasta</th>
                                            <th width="180px">Procedencia</th>
                                            <th width="100px">Estado</th>
                                            <th width="120px" class="text-right">Precio U.</th>
                                            <th width="120px" class="text-right">Precio Total</th>
                                            @if($order->status_id === 1)
                                                <th width="150px"></th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->products()->get() as $product)
                                            <tr>
                                                <td>
                                                    <strong>{{ $product->product->name }}</strong><br>
                                                    <p>{{ $product->description }}</p>
                                                </td>
                                                <td class="text-center">{{ $product->quantity }}</td>
                                                <td>{{ $product->registration_from }}</td>
                                                <td>{{ $product->registration_to }}</td>
                                                <td>{{ $product->origin->name }}</td>
                                                <td>{{ $product->status->name }}</td>
                                                <td class="text-right">{{ $product->unit_price }}</td>
                                                <td class="text-right">{{ $product->total_price }}</td>
                                                @if($order->status_id === 1)
                                                    <td>
                                                        <a href="{{ route('orderProducts.edit', ['orderProduct' => $product]) }}" class="btn btn-warning btn-sm">Editar</a>
                                                        <form method="POST" action="{{ route('orderProducts.destroy', ['orderProduct' => $product->id]) }}" style="display:inline;">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm btn-delete" data-message="¿Esta por eliminar el registro. Desea continuar?" >
                                                                Eliminar
                                                            </button>
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
@endsection