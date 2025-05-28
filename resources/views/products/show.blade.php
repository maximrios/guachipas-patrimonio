@extends('layouts.app')

@section('content')
<div class="">
    @if(session('message'))
    <div class="alert alert-{{ session('type') }} show" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_content">

                    <section class="content invoice">
                        <div class="row">
                            <div class="invoice-header">
                                <h1>
                                    <i class="fa fa-globe"></i> {{ $product->name }}
                                </h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="{{ url('products') }}" class="btn btn-default">Volver</a>

                                <a id="addProducto" href="#" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal">Agregar atributos</a>

                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Listado de atributos</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre atributo</th>
                                <th>Slug</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product->attributes as $attribute)
                                <tr>
                                    <td>{{ $attribute->name }}</td>
                                    <td>{{ $attribute->slug }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Agregar atributos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="{{ route('productAttributes.store') }}" method="POST">
                        @csrf
                        <select name="attributes[]" id="attribute_id" class="form-control select" multiple>
                            @foreach ($attributes as $attribute)
                                <option value="{{ $attribute->id }}" {{ in_array($attribute->id, $product->attributes->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $attribute->name }}</option>
                            @endforeach
                        </select>
                        <hr>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-primary">Actualizar atributos</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.select').select2();

        $('#addInventory').on('click', function(event) {
            event.preventDefault()
            let form = $(this).closest('form')[0]
            var formData = new FormData(document.getElementById('form-untracked'));
            $.ajax({
                url: form.action,
                type: 'POST',
                data: formData,
                dataType: 'json',
                processData: false, 
                contentType: false,
                success: function(response) {
                    $('#modal').hide();
                    window.location.reload();
                }
            })
        });
    });
</script>
@endsection