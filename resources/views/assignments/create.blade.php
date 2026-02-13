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
                    <form action="{{ url('assignments') }}" method="post" class="" autocomplete="false">
                    @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <x-search 
                                    id="employee_id"
                                    url="http://131.107.4.117:8081/api/v1/employees/autocomplete"
                                    key="user_id"
                                />
                                <input type="hidden" id="assign_to" name="assign_to" class="form-control" placeholder="Nombre completo" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="area_id" class="control-label">Area</label>
                                <select id="area_id" name="area_id" class="form-control">
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-9">
                                <label for="observation" class="control-label">Observaciones</label>
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
    /*
    $(function() {
        $('#employee_id').select2({
            language: "es",
            minimumInputLength: 3,
            minimumResultsForSearch: 20,
            ajax: {
                url: "http://131.107.4.117:8081/api/v1/employees",
                dataType: 'json',
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });
        $('#employee_id').on('change', function() {
            var employee_id = $(this).val();
            var employee = $(this).find('option:selected').text();
            $('#assign_to').val(employee);
        });
    })
    */
</script>
@endsection