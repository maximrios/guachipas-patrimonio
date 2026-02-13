@extends('layouts.app')

@section('content')

<div class="">
	<div class="page-title">
    	<div class="title_left">
        	<h3>Proyectos <small>Detalle de proyecto</small></h3>
        </div>
    </div>
	<div class="clearfix"></div>
	<div class="row">
    	<div class="col-md-12">
        	<div class="x_panel">
            	<div class="x_title">
                	<h2>Detalle de proyecto</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    	<li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    	<li class="pull-right"><a href="#" target="_blank"><i class="fa fa-print"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <section class="content invoice">
                      	<!-- title row -->
                      	<div class="row">
                        	<div class="col-xs-12 invoice-header">
                          		<h1>
                                	<i class="fa fa-globe"></i> {{ ($audit->code) ? $audit->code:'N/A' }}
                                </h1>
                        	</div>
                        	<!-- /.col -->
                      	</div>
                      	<!-- info row -->
                      	<div class="row invoice-info">
                        	<div class="col-sm-4 invoice-col">
                          		Gerencia<br>
                          		<strong>{{ $audit->area->name ?? '' }}</strong><br>
                                  {{ $audit->subarea->name ?? '' }}<br><br>
                          		Area<br>
                          		<strong>
									@foreach ($audit->area->ancestors as $ancestor)
										{{ $ancestor->name }}<br>
									@endforeach
								</strong>
								{{ $audit->subarea }}
                        	</div>
                        	<!-- /.col -->
                        	<div class="col-sm-4 invoice-col">
                          		<strong>Período:</strong>&nbsp;{{ $audit->period }}<br>
                          		<strong>Alcance:</strong>&nbsp;{{ $audit->scope->name ?? 'Sin definir' }}<br>
                          		<strong>Mes de inicio:</strong>&nbsp;{{ $audit->monthName }}<br><br>
                        	</div>
                        	<!-- /.col -->
                        	<div class="col-sm-4 invoice-col">
                          		<b>Auditoría # {{ str_pad($audit->id, 6, '0', STR_PAD_LEFT) }}</b>
                          		<br>
                        	</div>
                        	<!-- /.col -->
                        	<div class="clearfix"></div><br>
                      	</div>
                      	<div class="row">
                      		<div class="col-sm-12">
                      			<label for="">Objetivo</label><br>
                      			<p>{{ $audit->target }}</p>
                      			<hr>
                      		</div>
                      	</div>
                        <div class="row">
							<div class="col-sm-6"></div>
                            <div class="col-sm-6">
                                
                                <form action="{{ route('projects.destroy', ['audit' => $audit]) }}" method="post" class="pull-right" style="display: inline-block;">
									@csrf
									@method('DELETE')
                                	<button type="submit" class="btn btn-danger btn-delete pull-right" data-type="danger" data-message="Esta por eliminar el proyecto. Desea continuar?"><i class="fa fa-trash"></i>&nbsp;&nbsp;Eliminar</button>
								</form>
								<a href="{{ route('projects.edit', ['audit' => $audit]) }}" class="btn btn-warning pull-right"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Editar&nbsp;&nbsp;</a>
								<a href="{{ url('projects') }}" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Volver atrás</a>
                            </div>
                        </div>
                      	<hr>
                    </section>
            	</div>
        	</div>
    	</div>
	</div>
	
</div>

<div id="modal" class="modal fade" data-keyboard="false">
	<div class="modal-dialog">
    	<div class="modal-content"></div>
    </div>
</div>

@endsection
