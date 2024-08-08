@extends('layouts.app')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Proveedores<small></small></h3>
        </div>
        <div class="title_right">
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Agregar proveedor</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if ($errors->any())
						<div class="alert alert-error alert-dismissible" role="alert">
							<div class="alert-content">
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</div>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
						</div>
					@endif
                    <br>
                    <form action="{{ url('providers') }}" method="post" class="form-horizontal form-label-left" autocomplete="false">
                    @csrf
                        <div class="form-group row">
                            <label class="control-label col-md-2 col-sm-2">CUIT</label>
                            <div class="col-sm-10">
                                <input type="text" id="identity" name="identity" class="form-control" placeholder="N° de CUIT">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-2 col-sm-2">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-2 col-sm-2">Domicilio</label>
                            <div class="col-sm-10">
                                <input type="text" id="address" name="address" class="form-control" placeholder="Domicilio">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-2 col-sm-2">Correo electrónico</label>
                            <div class="col-sm-10">
                                <input type="text" id="email" name="email" class="form-control" placeholder="Correo electrónico">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-2 col-sm-2">Teléfono</label>
                            <div class="col-sm-10">
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="Teléfono">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-2 col-sm-2">Nombre de contacto</label>
                            <div class="col-sm-10">
                                <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Nombre de contacto">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group row">
                            <a href="{{ url('providers') }}" class="btn btn-default">Cancelar</a>
                            <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection