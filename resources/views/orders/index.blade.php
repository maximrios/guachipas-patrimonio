@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Altas patrimoniales <small></small></h3>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    
    @forelse ($orders as $order)
        <div class="col-sm-3">
            <x-card>
                <h4>
                    Alta # {{ $order->id }}
                    <span class="badge badge-{{$order->status->slug }} pull-right">
                        {{ $order->status->name }}
                    </span>
                </h4>
                <div>
                    <label>Area:</label> {{ $order->area->name }} {{ $order->area->responsible?->profile?->full_name }}<br>
                    <label>Expediente:</label> {{ $order->file }}<br>
                    <label>Fecha de alta:</label> {{ $order->created_at->format('d/m/Y') }}<br><br>
                    <label>Bienes cargados:</label> {{ $order->assets_count }}<br>
                </div>
                <x-button 
                    variant="primary" 
                    size="lg" 
                    href="{{ route('orders.show', ['order' => $order->id]) }}"
                    class="w-100"
                >
                    Ver detalle
                </x-button>
            </x-card>
        </div>    
    @empty
        <x-card class="col-sm-12">
            <x-empty-state 
                icon="fa fa-inbox"
                title="No hay altas patrimoniales"
                description="Comienza registrando tu primera alta patrimonial."
                actionText="Generar alta patrimonial"
                actionUrl="{{ url('orders/create') }}"
            />
        </x-card>    
    @endforelse

    @if ($orders->count() > 0)
        <div class="col-sm-3">
            <x-card>
                <x-empty-state 
                    icon="fa fa-inbox"
                    title="Agrega una nueva alta patrimonial"
                    description="Registra una nueva alta patrimonial para seguir llevando el control de los bienes"
                    actionText="Generar nueva alta patrimonial"
                    actionUrl="{{ url('orders/create') }}"
                />
            </x-card>
        </div>
    @endif
</div>
@endsection