@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Reportes <small></small></h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Inventario</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="{{ route('inventories.export') }}" target="_blank" method="post" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="#">Area</label>
                                <select name="area_id" id="area_id" class="form-control">
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="#">&nbsp;</label>
                                <button class="btn btn-success form-control">Exportar a excel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Altas</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="{{ route('orders.export') }}" target="_blank" method="post" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="#">Fecha desde</label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" id="date_from" name="date_from" value="{{ date('d/m/Y') }}">
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                            </div><!-- /input-group -->
                        </div>
                        <div class="col-sm-3">
                            <label for="#">Fecha hasta</label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" id="date_to" name="date_to" value="{{ date('d/m/Y') }}">
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                            </div><!-- /input-group -->
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="#">Area</label>
                                <select name="area_id" id="area_id" class="form-control">
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="">&nbsp;</label>
                                <button class="btn btn-success form-control">Exportar a excel</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(function() {
	    $('.datepicker').datepicker({
		    changeMonth: true,
	 		changeYear: true,
	 		dateFormat: "dd/mm/yy",
	 	});
	})
</script>

@endsection
