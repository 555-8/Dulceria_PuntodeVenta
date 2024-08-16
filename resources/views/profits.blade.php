@extends('layouts.app')

@section('content')
    <h1>Ganancias</h1>
    
    <div class="card">
        <div class="card-body">
            <h3>Gasto Total en compra de productos: ${{ number_format($totalAcquisitionCost, 2) }}</h3>
            <h3>Ingresos Totales de Ventas: ${{ number_format($totalRevenue, 2) }}</h3>
            <h3>Ganancia Total: ${{ number_format($totalProfit, 2) }}</h3>
        </div>
    </div>

    <a href="{{ url('home') }}" class="btn btn-secondary mt-3">Regresar</a>
@endsection
