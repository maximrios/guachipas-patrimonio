@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Altas patrimoniales <small></small></h3>
    </div>
    <div class="title_right">
        <a href="{{ url('orders/create') }}" class="btn btn-primary pull-right">Nueva alta</a>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Altas patrimoniales</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Número</th>
                                <th>Unidad Organizacional</th>
                                <th>Expediente</th>
                                <th>Estado</th>
                                <th style="width:75px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                @php
                                    $sortableNumber = $order->year . str_pad($order->number, 3, '0', STR_PAD_LEFT);
                                @endphp
                                <tr>
                                    <td data-order="{{ $sortableNumber }}">{{ $order->number }}/{{ $order->year }}</td>
                                    <td>{{ $order->organization->name }} {{ $order->organization->responsible?->profile?->full_name }}</td>
                                    <td>{{ $order->file }}</td>
                                    <td>
                                        <span class="badge badge-{{$order->status->slug }}">
                                            {{ $order->status->name }}
                                        </span>
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{ route('orders.show', ['order' => $order->id])}}">Detalle</a>
                                        
                                    </td>
                                </tr>    
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('.table').dataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json'
            },
            order: [[0, 'desc']],
        });
    })
    
</script>
@endsection