@extends('layouts.app')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Altas patrimoniales de Bienes <small></small></h3>
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
                    @if(session('message'))
                        <div class="alert alert-{{ session('type') }} show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
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
                    <form action="{{ url('orders') }}" method="post" class="form-horizontal form-label-left" autocomplete="false">
                    @csrf
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Carácter</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" id="character" name="character" class="form-control" value="ADMINISTRACIÓN CENTRAL" placeholder="Carácter" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Institución</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" id="institution" name="institution" class="form-control" value="PODER EJECUTIVO" placeholder="Institución" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Jurisdicción</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" id="organization_name" name="organization_name" class="form-control" placeholder="Jurisdicción" value="MINISTERIO DE SALUD PÚBLICA" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Unidad de Organización</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select id="organization_id" name="organization_id" class="form-control">
                                    @foreach ($organizations as $organization)
                                        <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Expediente</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" id="file" name="file" class="form-control" placeholder="Expediente">
                            </div>
                        </div>
                        <input type="hidden" name="status_id" value="1">
                        <input type="hidden" name="user_id" value="1">
                        <input type="hidden" name="type" value="1">
                        <div class="ln_solid"></div>
                        <div class="form-group row">
                            <a href="{{ url('orders') }}" class="btn btn-default">Cancelar</a>
                            <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection