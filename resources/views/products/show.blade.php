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
                                <th width="100"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product->attributes as $attribute)
                                <tr>
                                    <td>{{ $attribute->name }}</td>
                                    <td>{{ $attribute->slug }}</td>
                                    <td>
                                        <form action="{{ route('productAttributes.destroy', $attribute->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
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
                        <div class="form-group">
                            <label for="name">Nombre <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug <span class="text-danger">*</span></label>
                            <input type="text" id="slug" name="slug" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="icon">Icono</label>
                            <input type="text" id="icon" name="icon" class="form-control">
                        </div>
                        <hr>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-primary">Agregar atributo</button>
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