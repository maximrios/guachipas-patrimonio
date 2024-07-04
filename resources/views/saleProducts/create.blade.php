@extends('layouts/app')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Bajas patrimoniales<small></small></h3>
        </div>
        <div class="title_right">
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Formulario de Baja de un Bien</h2>
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
                            <br>
						</div>
					@endif
                    <form action="{{ route('saleProducts.store') }}" method="post" class="form-horizontal form-label-left" autocomplete="false">
                    @csrf
						<div class="form-group row">
                            <div class="col-sm-12">
                                <label class="control-label" for="inventory_id">Buscar</label>
								<select id="inventory_id" name="inventory_id" class="form-control"></select>
							</div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label class="control-label" for="registration">Matrícula</label>
                                <input type="text" id="registration" name="registration" value="" class="form-control" readonly />
                            </div>
                            <div class="col-sm-3">
                                <label class="control-label" for="name">Nombre</label>
                                <input type="text" id="name" name="name" value="" class="form-control" readonly />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label class="control-label" for="organization">Unidad de organización</label>
                                <input type="text" id="organization" name="organization" value="" class="form-control" readonly />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label class="control-label" for="description_product">Descripción</label>
								<textarea class="form-control" name="description_product" id="description_product" rows="3" readonly></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="control-label" for="reason">Motivo de baja</label>
                                <select name="sale_product_reason_id" id="sale_product_reason_id" class="form-control">
                                    @foreach ($reasons as $reason)
                                        <option value="{{ $reason->id }}">{{ $reason->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
						<div class="form-group row">
                            <div class="col-sm-12">
                                <label class="control-label" for="description">Observaciones</label>
								<textarea class="form-control" name="description" id="description" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group row">
							<input type="hidden" name="sale_id" value="{{ $sale->id }}">
							<input type="hidden" name="section" value="1">
							<input type="hidden" name="subsection" value="1">
                            <input type="hidden" name="quantity" value="1">
                            <!--
                            <input type="hidden" name="sale_product_status_id" value="1">
                            <input type="hidden" name="sale_product_reason_id" value="1">
                            -->
                            <a href="{{ route('sales.show', [$sale]) }}" class="btn btn-default">Cancelar</a>
                            <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
    $(document).ready(function() {
        //OrderProduct.addForm();
        $('#inventory_id').select2({
            language: "es",
            minimumInputLength: 3,
            minimumResultsForSearch: 20,
            ajax: {
                url: "{{ route('inventories.search') }}",
                dataType: 'json',
            },
        }).on("change", function(e) {
            $.ajax({
                url: "{{ route('inventories.get') }}",
                type: 'GET',
                dataType: 'json',
                data: {
                    id: $(this).val()
                },
                success: function(data) {
                    console.log(data.data);
                    $('#registration').val(data.data.registration);
                    $('#name').val(data.data.product);
                    $('#organization').val(data.data.organization);
                    $('#description_product').val(data.data.description);
                }
            });
        });

        
});
</script>
@endsection