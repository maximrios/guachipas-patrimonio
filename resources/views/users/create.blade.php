@extends('layouts.app')

@section('content')

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Usuarios <small></small></h3>
        </div>
        <div class="title_right">
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Formulario de Alta</h2>
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
                    <form action="{{ url('users') }}" method="post" class="form-horizontal form-label-left" autocomplete="false">
                    @csrf
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="name">Nombre</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" id="name" name="name" class="form-control" value="" placeholder="Nombre completo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="email">Email</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" id="email" name="email" class="form-control" value="" placeholder="Correo electrónico">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="password">Contraseña</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="password" id="password" name="password" class="form-control" value="" placeholder="Contraseña">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="confirm-password">Repetir contraseña</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="password" id="confirm-password" name="confirm-password" class="form-control" value="" placeholder="Repetir contraseña">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="roles[]">Rol</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="roles[]" id="roles[]" class="form-control" multiple>
                                    @foreach ($roles as $rol)
                                        <option value="{{ $rol }}">{{ $rol }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group row">
                            <a href="{{ url('users') }}" class="btn btn-default">Cancelar</a>
                            <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection