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
                    <h2>Editar Tipo de Documento</h2>
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
                    <form action="{{ route('document-types.update', $documentType) }}" method="POST" class="form-horizontal form-label-left">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3">Nombre <span class="text-danger">*</span></label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" name="name" class="form-control" placeholder="Ej: Contrato, DNI, Foto" value="{{ old('name', $documentType->name) }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3">Slug</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" name="slug" class="form-control" placeholder="contrato, dni, foto" value="{{ old('slug', $documentType->slug) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3">Descripción</label>
                            <div class="col-md-9 col-sm-9">
                                <textarea name="description" class="form-control" rows="3" placeholder="Descripción opcional">{{ old('description', $documentType->description) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3">Tipos MIME permitidos</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" name="allowed_mime_types" class="form-control" placeholder="application/pdf, image/jpeg, image/png" value="{{ old('allowed_mime_types', implode(', ', $documentType->allowed_mime_types ?? [])) }}">
                                <small class="text-muted">Separar por comas</small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3">Tamaño máximo (MB)</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="number" name="max_size_mb" class="form-control" placeholder="5" value="{{ old('max_size_mb', $documentType->max_size_mb) }}" min="1" max="100">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3">Opciones</label>
                            <div class="col-md-9 col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="is_required" value="1" {{ old('is_required', $documentType->is_required) ? 'checked' : '' }}> Obligatorio
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $documentType->is_active) ? 'checked' : '' }}> Activo
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group row">
                            <a href="{{ route('document-types.index') }}" class="btn btn-default">Cancelar</a>
                            <button type="submit" class="btn btn-primary pull-right">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
