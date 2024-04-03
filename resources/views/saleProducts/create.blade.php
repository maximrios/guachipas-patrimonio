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
						</div>
					@endif
                    <br>
                    <form action="{{ route('saleProducts.store') }}" method="post" class="form-horizontal form-label-left" autocomplete="false">
                    @csrf
						<div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="product_id">Matrícula</label>
							<div class="col-md-9 col-sm-9">
								<select id="product_id" name="product_id" class="form-control"></select>
							</div>
                        </div>
                        <hr>
						<div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="description">Descripción</label>
                            <div class="col-md-9 col-sm-9 ">
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
        $('#product_id').select2({
            language: "es",
            minimumInputLength: 3,
            minimumResultsForSearch: 20,
            ajax: {
                url: "{{ route('inventories.search') }}",
                dataType: 'json',
            }
        });
});
</script>
@endsection