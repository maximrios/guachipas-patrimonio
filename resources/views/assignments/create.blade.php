@extends('layouts.app')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Asignaciones<small></small></h3>
        </div>
        <div class="title_right">
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Asignaciones</h2>
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
                    <form action="{{ url('assignments') }}" method="post" class="form-horizontal form-label-left" autocomplete="false">
                    @csrf
                        <div class="form-group row">
                            <label for="assing_to" class="control-label col-md-3 col-sm-3 ">Dirigido a </label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="employee_id" id="employee_id" class="form-control">
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->profile->name }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" id="assign_to" name="assign_to" class="form-control" placeholder="Nombre completo" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="organization_id" class="control-label col-md-3 col-sm-3 ">Unidad de Organización</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select id="organization_id" name="organization_id" class="form-control">
                                    @foreach ($organizations as $organization)
                                        <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="observation" class="control-label col-md-3 col-sm-3 ">Observaciones</label>
                            <div class="col-md-9 col-sm-9 ">
                                <textarea name="observation" id="observation" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group row">
                            <a href="{{ url('assignments') }}" class="btn btn-default">Cancelar</a>
                            <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#employee_id').on('change', function() {
            var employee_id = $(this).val();
            var employee = $(this).find('option:selected').text();
            $('#assign_to').val(employee);
        });
    })
</script>
@endsection