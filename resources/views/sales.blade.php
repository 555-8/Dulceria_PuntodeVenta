@extends('layouts.app')

@section('content')
    <h1>Registrar Venta</h1>
    
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <form action="{{ url('sales') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nombre del Producto:</label>
            <select name="candy_id" class="form-control" required>
                <option value="">Seleccione un producto</option>
                @foreach ($candies as $candy)
                    <option value="{{ $candy->id }}">{{ $candy->name }} ({{ $candy->units }} unidades)</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Unidades Vendidas:</label>
            <input type="number" name="units_sold" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar Venta</button>
        <a href="{{ url('home') }}" class="btn btn-secondary">Regresar</a>
    </form>
@endsection
