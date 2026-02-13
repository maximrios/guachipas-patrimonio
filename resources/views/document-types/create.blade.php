@extends('layouts.app')

@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Tipos de Documentos</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Nuevo Tipo de Documento</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <div class="alert-content">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                    </div>
                    @endif
                    <form action="{{ route('document-types.store') }}" method="POST" class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3">Nombre <span class="text-danger">*</span></label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" name="name" class="form-control" placeholder="Ej: Contrato, DNI, Foto" value="{{ old('name') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3">Slug</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" name="slug" class="form-control" placeholder="contrato, dni, foto (se genera automáticamente)" value="{{ old('slug') }}">
                                <small class="text-muted">Dejar vacío para generar automáticamente</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3">Descripción</label>
                            <div class="col-md-9 col-sm-9">
                                <textarea name="description" class="form-control" rows="3" placeholder="Descripción opcional">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3">Tipos MIME permitidos</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" name="allowed_mime_types" class="form-control" placeholder="application/pdf, image/jpeg, image/png" value="{{ old('allowed_mime_types', 'application/pdf, image/jpeg, image/png') }}">
                                <small class="text-muted">Separar por comas</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3">Tamaño máximo (MB)</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="number" name="max_size_mb" class="form-control" placeholder="5" value="{{ old('max_size_mb', 5) }}" min="1" max="100">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3">Opciones</label>
                            <div class="col-md-9 col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="is_required" value="1" {{ old('is_required') ? 'checked' : '' }}> Obligatorio
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}> Activo
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group row">
                            <a href="{{ route('document-types.index') }}" class="btn btn-default">Cancelar</a>
                            <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
