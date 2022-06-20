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
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
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
                                    <strong>Carácter: </strong>
                                    <br>
                                    <strong>Institución: </strong>
                                    <br>
                                    <strong>Jurisdicción: </strong>
                                    <br>
                                    <strong>Unid. De Organización: </strong>
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
                                <b>Planilla #{{ Str::padLeft($sale->id, 6, '0') }}</b>
                                <br>
                                <br>
                                <b>Fecha:</b> {{ $sale->created_at }}
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
                        <div class="row no-print">
                            <div class=" ">
                                <a href="{{ url('sales') }}" class="btn btn-default">Cancelar</a>
                                <a href="{{ route('sales.print', ['sale' => $sale]) }}" class="btn btn-primary pull-right" style="margin-right: 5px;" target="_blank"><i class="fa fa-download"></i> Generar Planilla de Alta</a>
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