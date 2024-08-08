@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Proveedores <small></small></h3>
    </div>
    <div class="title_right">
        <a href="{{ url('providers/create') }}" class="btn btn-primary pull-right">Nuevo proveedor</a>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Proveedores</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Contacto</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Domicilio</th>
                            <th style="width:50px;"></th>
                            <th style="width:50px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($providers as $provider)
                            <tr>
                                <td>
                                    <strong>CUIT N° {{ $provider->identity }}</strong><br />
                                    {{ $provider->name }}
                                </td>
                                <td>{{ $provider->contact_name }}</td>
                                <td>{{ $provider->email }}</td>
                                <td>{{ $provider->phone }}</td>
                                <td>{{ $provider->address }}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="{{ route('providers.edit', ['provider' => $provider->id])}}">Editar</a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('providers.destroy', ['provider' => $provider->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm btn-delete" data-message="¿Esta por eliminar el registro. Desea continuar?" >
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $(function() {
        $('.table').dataTable();
    })
</script>
@endsection
