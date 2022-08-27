@extends('layouts.app')

@section('content')

<div class="">
	<div class="page-title">
    	<div class="title_left">
        	<h3>Roles <small>Administrar todos los roles</small></h3>
        </div>
    </div>
	<div class="clearfix"></div>
	<div class="row">
    	<div class="col-md-12 col-sm-12 col-xs-12">
        	<div class="x_panel">
            	<div class="x_title">
                    <h2>Agregar rol</h2>
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
                	<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" action="{{ route('roles.store') }}" method="post">
						@csrf
						<div class="row">
                        	<div class="form-group col-sm-12">
                        		<label class="control-label" for="name">Nombre <span class="required">*</span></label>
                          		<input type="text" id="name" name="name" class="form-control">
                        	</div>
                        </div>
						<div class="row">
                        	<div class="form-group col-sm-12">
                        		<label class="control-label" for="name">Permisos <span class="required">*</span></label><br>
								@foreach ($permissions as $permission)
									<div class="col-sm-3">
										<input type="checkbox" id="" name="permission[]" value="{{ $permission->id }}">&nbsp;{{ $permission->name }}<br>
									</div>
								@endforeach
							</div>
						</div>
                      	<div class="ln_solid"></div>
                      	<div class="row">
                      		<div class="form-group">
                          		<a href="{{ route('roles.index') }}" class="btn btn-default pull-left">Cancelar</a>
                          		<button type="submit" class="btn btn-success pull-right">Guardar</button>
                      		</div>
                      	</div>
                	</form>
            	</div>
        	</div>
    	</div>
	</div>
</div>
@endsection