@extends('layouts/app')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Inventario <small></small></h3>
        </div>
        <div class="title_right">
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Editar bien</h2>
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
                        <br>
					@endif
                    <form action="{{ route('inventories.update', $inventory) }}" method="post" class="form-horizontal form-label-left" autocomplete="false">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{ $inventory->id }}">
						<div class="form-group row">
                            <div class="col-sm-12">
                                <label class="control-label" for="description">Descripción</label>
                                <textarea class="form-control" name="description" id="description" rows="3" readonly>{{ $inventory->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label class="control-label" for="observations">Observación</label>
							    <textarea class="form-control" name="observations" id="observations" rows="3">{{ $inventory->observations }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="control-label" for="quantity">Estado</label>
                                <select id="status_id" name="status_id" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}" {{ $inventory->status_id == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label" for="unit">Disponibilidad</label>
                                <select name="available" id="available" class="form-control">
                                    <option value="0" {{ $inventory->available ? '':'selected'  }}>No disponible</option>
                                    <option value="1" {{ $inventory->available ? 'selected':''  }}>Disponible</option>
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group row">
                            <a href="{{ route('inventories.show', [$inventory]) }}" class="btn btn-default">Cancelar</a>
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
        SaleProduct.init();
    $('#product_id').select2({
        language: "es",
        minimumInputLength: 3,
        minimumResultsForSearch: 20,
        ajax: {
            url: "{{ route('products.list') }}",
            dataType: 'json',
            // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
        },
        escapeMarkup: function(markup) {
            return markup;
        },
        templateSelection(item) {
            return item.name || item.id;
        },
        templateResult: function(data) {
            if (data.loading) {
                return data.text;
            }
            return '<strong>'+data.name+'</strong><br/><span>'+data.nomenclator+'</span>';
        },
    });
});
</script>
@endsection