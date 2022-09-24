@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Nomenclador patrimonial <small></small></h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Nomenclador patrimonial</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-down"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Clase</th>
                            <th>Grupo</th>
                            <th>Subgrupo</th>
                            <th>Cuenta</th>
                            <th>Especie</th>
                            <th>Subespecie</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->type }}</td>
                                <td>{{ $product->group }}</td>
                                <td>{{ $product->subgroup }}</td>
                                <td>{{ $product->account }}</td>
                                <td>{{ $product->species }}</td>
                                <td>{{ $product->subspecies }}</td>
                                <td>{{ $product->name }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
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
