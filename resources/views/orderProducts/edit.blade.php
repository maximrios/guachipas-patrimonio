@extends('layouts/app')

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
                    <h2>Editar Bien</h2>
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
                    <form action="{{ route('orderProducts.update', $orderProduct) }}" method="post" class="form-horizontal form-label-left" autocomplete="false">
                    @csrf
                    @method('PUT')
						<div class="form-group">
                            <label class="control-label" for="product_id">Clasificación</label>
							<select id="product_id" name="product_id" class="form-control select" data-url="{{ route('products.list') }}">
                                @if($orderProduct->product)
                                    <option value="{{ $orderProduct->product_id }}" selected>{{ $orderProduct->product->nomenclator }} - {{ $orderProduct->product->name }}</option>
                                @endif
                            </select>
                        </div>
						<div class="form-group">
                            <label class="control-label" for="description">Descripción</label>
							<textarea class="form-control" name="description" id="description" rows="3">{{ old('description', $orderProduct->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="quantity">Cantidad</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" placeholder="Cantidad" value="{{ old('quantity', $orderProduct->quantity) }}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="order_product_found_id">Fondos</label>
                            <select id="order_product_found_id" name="order_product_found_id" class="form-control">
                                @foreach ($founds as $found)
                                    <option value="{{ $found->id }}" {{ (old('order_product_found_id', $orderProduct->order_product_found_id) == $found->id) ? 'selected':'' }}>{{ $found->id }} - {{ $found->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="control-label" for="order_product_origin_id">Procedencia</label>
                                    <select id="order_product_origin_id" name="order_product_origin_id" class="form-control">
                                        @foreach ($origins as $origin)
                                            <option value="{{ $origin->id }}" {{ (old('order_product_origin_id', $orderProduct->order_product_origin_id) == $origin->id) ? 'selected':'' }}>{{ $origin->id }} - {{ $origin->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label class="control-label col-md-3 col-sm-3" for="order_product_status_id">Estado</label>
                                    <select id="order_product_status_id" name="order_product_status_id" class="form-control">
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}" {{ (old('order_product_status_id', $orderProduct->order_product_status_id) == $status->id) ? 'selected':'' }}>{{ $status->id }} - {{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label class="control-label" for="valuation">Valuación</label>
                                    <select id="valuation" name="valuation" class="form-control">
                                        <option value="0" {{ (old('valuation', $orderProduct->valuation) == 0) ? 'selected' : '' }}>0 - Seleccione un método de valuación</option>
                                        <option value="1" {{ (old('valuation', $orderProduct->valuation) == 1) ? 'selected' : '' }}>1 - Precio de compras, precio de costo, valor histórico</option>
                                        <option value="2" {{ (old('valuation', $orderProduct->valuation) == 2) ? 'selected' : '' }}>2 - Precio de reposicion de plaza o de mercado</option>
                                    </select>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="control-label">N° de Factura</label>
                                    <input type="text" id="invoice" name="invoice" class="form-control" placeholder="Número de factura" value="{{ old('invoice', $orderProduct->invoice) }}">
                                </div>
                                <div class="col-sm-4">
                                    <label class="control-label">Fecha de Factura</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker" id="date_invoice" name="date_invoice" value="{{ old('date_invoice', $orderProduct->date_invoice) }}">
                                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="control-label" for="order_payment">N° Orden de Pago</label>
                                    <input type="text" id="order_payment" name="order_payment" class="form-control" placeholder="Número de orden de pago" value="{{ old('order_payment', $orderProduct->order_payment) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="provider_id">Proveedor</label>
                            <select id="provider_id" name="provider_id" class="form-control select">
                                <option value="0">Seleccione un proveedor</option>
                                @foreach ($providers as $provider)
                                    <option value="{{ $provider->id }}" {{ (old('provider_id', $orderProduct->provider_id) == $provider->id) ? 'selected':'' }}>{{ $provider->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label class="control-label" for="unit_price">Precio unitario</label>
                                    <input type="number" id="unit_price" name="unit_price" min="0" step="any" class="form-control" placeholder="Precio unitario" value="{{ old('unit_price', $orderProduct->unit_price) }}">
                                </div>
                                <div class="col-sm-3">
                                    <label class="control-label" for="total_price">Precio total</label>
                                    <input type="text" id="total_price" name="total_price" class="form-control" placeholder="Precio total" value="{{ old('total_price', $orderProduct->total_price) }}">
                                </div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group row">
							<input type="hidden" name="order_id" value="{{ $order->id }}">
							<input type="hidden" name="section" value="{{ $orderProduct->section }}">
							<input type="hidden" name="subsection" value="{{ $orderProduct->subsection }}">
                            <a href="{{ route('orders.show', [$order]) }}" class="btn btn-default">Cancelar</a>
                            <button type="submit" class="btn btn-primary pull-right">Actualizar</button>
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
            },
            escapeMarkup: function(markup) {
                return markup;
            },
            templateSelection(item) {
                return item.name || item.text || item.id;
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
