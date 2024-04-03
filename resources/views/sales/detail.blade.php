@extends('layouts.app')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Bajas patrimoniales</h3>
        </div>
        <div class="title_right">
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Planilla de Baja <small></small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <section class="content invoice">
                        <div class="row">
                            <div class="invoice-header">
                                <h1>
                                    <i class="fa fa-globe"></i> Planilla de Baja N° {{ $sale->number }} / {{ $sale->year }}
                                </h1>
                            </div>
                        </div>
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <div>
                                    <strong>Carácter: </strong><span>{{ $sale->character }}</span>
                                    <br>
                                    <strong>Institución: </strong><span>{{ $sale->institution }}</span>
                                    <br>
                                    <strong>Jurisdicción: </strong><span>{{ $sale->organization_name }}</span>
                                    <br>
                                </div>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <div>
                                    <strong>Expediente</strong>
                                    <br><b>C°:</b>
                                    <br><b>N°:</b> {{ $sale->file }}
                                </div>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <b>Planilla # {{ $sale->number }}</b>
                                <br>
                                <br>
                                <b>Fecha:</b> {{ $sale->created_at }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-default pull-right" href="{{ route('sales.print', ['sale' => $sale])}}" target="_blank">Ver planilla de baja</a>
                                @if($sale->status_id === 1)
                                    <form method="POST" action="{{ route('sales.destroy', ['sale' => $sale->id]) }}" style="display:inline;">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-delete pull-right" data-message="Está por eliminar la baja # {{ $sale->id }}. Desea continuar?">Eliminar</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="{{ route('saleProducts.create', [$sale]) }}" class="btn btn-primary pull-right" data-target=".bs-example-modal-lg">Agregar registro</a>
                            </div>
                        </div>
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
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sale->products()->get() as $product)
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
                                                <td>
                                                    <form action="#">
                                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                                    </form>
                                                </td>
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

<script>
    
    
    
</script>
@endsection