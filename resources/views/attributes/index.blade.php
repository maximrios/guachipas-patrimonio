@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Atributos <small></small></h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-8">
        <div class="x_panel">
            <div class="x_title">
                <h2>Atributos</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Slug</th>
                            <th>Ícono</th>
                            <th>Tipo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attributes as $attribute)
                            <tr>
                                <td>{{ $attribute->name }}</td>
                                <td>{{ $attribute->slug }}</td>
                                <td>{{ $attribute->icon }}</td>
                                <td>{{ $attribute->type }}</td>
                                <td>
                                    <form action="{{ route('attributes.destroy', $attribute->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm btn-delete" data-message="¿Estás seguro de eliminar este atributo?">Eliminar</button>
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
                <h2>Agregar atributo</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="{{ route('attributes.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nombre <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="type">Tipo</label>
                        <select id="type" name="type" class="form-control">
                            <option value="text">Texto</option>
                            <option value="number">Número</option>
                        </select>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">Agregar atributo</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('.table').dataTable();
    })
</script>
@endsection
