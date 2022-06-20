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
                                    <br><b>C°:</b>
                                    <br><b>N°:</b> {{ $order->file }}
                                </div>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <b>Planilla #{{ Str::padLeft($order->id, 6, '0') }}</b>
                                <br>
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
                                <a href="{{ route('orders.print', ['order' => $order]) }}" class="btn btn-default pull-right" style="margin-right: 5px;" target="_blank"><i class="fa fa-print"></i> Ver planilla de alta</a>
                                @if($products->count() > 0 && $order->status_id === 1)
                                    <a href="{{ route('orders.approve', ['order' => $order]) }}" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-check"></i> Confirmar planilla</a>
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
                                            <th>Cantidad</th>
                                            <th>Matrícula</th>
                                            <th>Procedencia</th>
                                            <th>Estado</th>
                                            <th>Precio U.</th>
                                            <th>Precio Total</th>
                                            @if($order->status_id === 1)
                                                <th></th>
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
                                                <td>{{ $product->quantity }}</td>
                                                <td></td>
                                                <td>{{ $product->origin->name }}</td>
                                                <td>{{ $product->status->name }}</td>
                                                <td>{{ $product->unit_price }}</td>
                                                <td>{{ $product->total_price }}</td>
                                                @if($order->status_id === 1)
                                                    <td>
                                                        <form method="POST" action="{{ route('orderProducts.destroy', ['orderProduct' => $product->id]) }}">
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