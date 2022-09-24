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
                    <form action="{{ url('users') }}" method="post" class="form-horizontal form-label-left" autocomplete="false">
                        @csrf
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="name">Nombre</label>
                                <input type="text" id="name" name="name" class="form-control" value="" placeholder="Nombre completo">
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="email">Email</label>
                                <input type="text" id="email" name="email" class="form-control" value="" placeholder="Correo electrónico">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="password">Contraseña</label>
                                <input type="password" id="password" name="password" class="form-control" value="" placeholder="Contraseña">
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="confirm-password">Repetir contraseña</label>
                                <input type="password" id="confirm-password" name="confirm-password" class="form-control" value="" placeholder="Repetir contraseña">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="control-label" for="roles[]">Rol</label>
                                <select name="roles[]" id="roles[]" class="form-control">
                                    @foreach ($roles as $rol)
                                        <option value="{{ $rol }}">{{ $rol }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <a href="{{ url('users') }}" class="btn btn-default">Cancelar</a>
                                <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
