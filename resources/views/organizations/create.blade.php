@extends('layouts.app')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>{{ $parent->name }}<small></small></h3>
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
                    <form action="{{ url('organizations') }}" method="post" class="form-horizontal form-label-left" autocomplete="false">
                    @csrf
                        <div class="row form-group">
                            <label for="code">Centro de costos</label>    
                            <input type="text" id="code" name="code" class="form-control" placeholder="Código">
                        </div>
                        <div class="row form-group">
                            <label for="name">Unidad Organizacional</label>    
                            <input type="text" id="name" name="name" class="form-control" placeholder="Unidad Organizacional">
                        </div>
                        <input type="hidden" name="parent_id" value="{{ $parent->id }}">
                        <div class="ln_solid"></div>
                        <div class="form-group row">
                            <a href="{{ route('organizations.show', ['organization' => $parent->id]) }}" class="btn btn-default">Cancelar</a>
                            <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection