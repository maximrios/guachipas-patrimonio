@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Asignaciones <small></small></h3>
    </div>
    <div class="title_right">
        <a href="{{ url('assignments/create') }}" class="btn btn-primary pull-right">Nueva asignación</a>&nbsp;
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Asignaciones</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Asignado</th>
                            <th>Unidad organizacional</th>
                            <th width="75px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assignments as $assignment)
                            <tr>
                                <td>{{ $assignment->created_at }}</td>
                                <td>{{ $assignment->assign_to }}</td>
                                <td>{{ $assignment->organization->name }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('assignments.show', ['assignment' => $assignment->id])}}">Detalle</a>
                                </td>
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
        $('.table').dataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json'
            }
        });
    })
    
</script>
@endsection
