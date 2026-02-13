@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row tile_count">
        <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-calendar"></i> Ejercicio</span>
            <div class="count">{{ session('exercise') }}</div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-sign-in"></i> Altas patrimoniales</span>
            <div class="count">{{ $orders->count() }}</div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-sign-out"></i> Bajas patrimoniales</span>
            <div class="count">{{ $sales->count() }}</div>
        </div>
    </div>
    <div class="row">
		<div class="col-md-4">
			<x-card class="bg-primary text-white mb-4">
				<h3>Bienes muebles </h3>
				<p>Utilice el menú lateral para navegar por las diferentes secciones del sistema.</p>
			</x-card>
		</div>
		<div class="col-md-4">
			<x-card class="bg-warning text-white mb-4">
				<h3>Bienes inmuebles</h3>
				<p>Utilice el menú lateral para navegar por las diferentes secciones del sistema.</p>
			</x-card>
		</div>
	</div>
</div>
@endsection
