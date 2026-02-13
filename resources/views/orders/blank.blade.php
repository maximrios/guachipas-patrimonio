@extends('layouts.app')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Seleccionar Tipo de Alta <small></small></h3>
        </div>
        <div class="title_right">
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tipos de Alta Patrimonial</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p class="lead">Seleccione el tipo de alta patrimonial que desea realizar:</p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <i class="fa fa-archive fa-4x text-primary mb-3"></i>
                                    <h4>Bienes Muebles</h4>
                                    <p class="text-muted">Registro de bienes muebles como mobiliario, equipamiento, herramientas, etc.</p>
                                    <a href="{{ route('orders.create') }}?type=goods" class="btn btn-primary btn-block">
                                        <i class="fa fa-plus"></i> Alta de Bienes
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <i class="fa fa-building fa-4x text-success mb-3"></i>
                                    <h4>Inmuebles</h4>
                                    <p class="text-muted">Registro de terrenos, edificios, oficinas y propiedades inmobiliarias.</p>
                                    <a href="{{ route('orders.create') }}?type=property" class="btn btn-success btn-block">
                                        <i class="fa fa-plus"></i> Alta de Inmuebles
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <i class="fa fa-car fa-4x text-warning mb-3"></i>
                                    <h4>Rodados</h4>
                                    <p class="text-muted">Registro de autos, camionetas, maquinaria y otros vehiculos.</p>
                                    <a href="{{ route('orders.create') }}?type=vehicle" class="btn btn-warning btn-block">
                                        <i class="fa fa-plus"></i> Alta de Rodados
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group row">
                        <a href="{{ route('orders.index') }}" class="btn btn-default">
                            <i class="fa fa-arrow-left"></i> Volver al listado
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border: 1px solid #e5e5e5;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }
    .card:hover {
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transform: translateY(-5px);
    }
    .card i {
        display: block;
        margin-bottom: 15px;
    }
    .card h4 {
        margin-bottom: 10px;
    }
    .card p {
        min-height: 60px;
    }
    .btn-block {
        margin-top: 15px;
    }
</style>
@endsection
