@extends('layouts.app')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Unidades organizacionales<small></small></h3>
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
                    <form action="{{ url('organizations') }}" method="post" class="form-horizontal form-label-left" autocomplete="false">
                    @csrf
                        <div class="row">
                            <div class="col-sm-2">
                                <label class="control-label">Código</label>    
                                <input type="text" id="code" name="code" class="form-control" placeholder="Código">
                            </div>
                            <div class="col-sm-10">
                                <label class="control-label">Unidad Organizacional</label>    
                                <input type="text" id="name" name="name" class="form-control" placeholder="Unidad Organizacional">
                            </div>
                        </div>
                        <input type="hidden" name="organization_id" value="0">
                        <div class="ln_solid"></div>
                        <div class="form-group row">
                            <a href="{{ url('organizations') }}" class="btn btn-default">Cancelar</a>
                            <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection