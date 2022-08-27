@extends('layouts.app')

@section('content')
<style>
	.form-horizontal button[type="submit"] {
		margin-top: 24px;		
	}
</style>
<div class="">
	<div class="page-title">
    	<div class="title_left">
        	<h3>Roles <small>Administrar todos los roles</small></h3>
        </div>
		<div class="title_right">
			<a href="{{ route('roles.create') }}" class="btn btn-primary pull-right">Agregar rol</a>
		</div>
    </div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-xs-12">
        	<div class="x_panel">
            	<div class="x_title">
                	<h2>
                		Roles<small></small>
                	</h2>
                	<div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="auditorias" class="table table-striped">
                    	<thead>
                        	<tr>
                          		<th width="50px">ID</th>
                          		<th>Nombre</th>
                          		<th width="75px"></th>
                        	</tr>
                      	</thead>
                      	<tbody>
                      		@if($roles->count() > 0)
                      			@foreach ($roles as $role)
	                      			<tr>
                      					<td>{{ $role->id }}</td>
                      					<td>{{ $role->name }}</td>
                      					<td>
	                      					<a href="{{ route('roles.edit', ['role' => $role]) }}" class="btn btn-warning btn-sm"><i class="fa fa-search"></i>&nbsp;Editar</a>
                      					</td>
                      				</tr>	
                      			@endforeach
                      		@else
                      			<tr>
                      				<td colspan="5" class="text-center">No hay registros para mostrar</td>
                      			</tr>
                      		@endif
                      	</tbody>
                    </table>
                </div>
            </div>
        </div>
		<div class="clearfix"></div>
	</div>
</div>	
@endsection