@extends('layouts.app')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Tipos de Documentos</h3>
        </div>
        <div class="title_right">
            <a href="{{ route('document-types.create') }}" class="btn btn-primary pull-right">
                <i class="fa fa-plus"></i> Nuevo Tipo
            </a>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_content">
                    @if(session('message'))
                    <div class="alert alert-{{ session('type') }} show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Slug</th>
                                <th>Obligatorio</th>
                                <th>Tamaño Max.</th>
                                <th>Estado</th>
                                <th width="150px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($documentTypes as $documentType)
                            <tr>
                                <td>{{ $documentType->name }}</td>
                                <td><code>{{ $documentType->slug }}</code></td>
                                <td>
                                    @if($documentType->is_required)
                                        <span class="badge badge-warning">Si</span>
                                    @else
                                        <span class="badge badge-secondary">No</span>
                                    @endif
                                </td>
                                <td>{{ $documentType->max_size_mb }} MB</td>
                                <td>
                                    @if($documentType->is_active)
                                        <span class="badge badge-success">Activo</span>
                                    @else
                                        <span class="badge badge-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('document-types.edit', $documentType) }}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('document-types.destroy', $documentType) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Está seguro de eliminar este tipo de documento?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No hay tipos de documentos registrados</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
