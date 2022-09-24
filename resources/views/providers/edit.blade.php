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
                    <h2>Editar proveedor</h2>
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
                    <form action="{{ route('providers.update', $provider->id) }}" method="post" class="form-horizontal form-label-left" autocomplete="false">
                        @csrf
					    @method('PUT')
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="control-label">Nombre</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Nombre" value="{{ $provider->name }}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label">Domicilio</label>
                                <input type="text" id="address" name="address" class="form-control" placeholder="Domicilio" value="{{ $provider->address }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="control-label">Correo electrónico</label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="Correo electrónico" value="{{ $provider->email }}">
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label">Teléfono</label>
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="Teléfono" value="{{ $provider->phone }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="control-label">Nombre de contacto</label>
                                <input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Nombre de contacto" value="{{ $provider->contact_name }}">
                            </div>
                        </div>
						<input type="hidden" name="id" value="{{ $provider->id }}">
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
