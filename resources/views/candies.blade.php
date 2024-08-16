@extends('layouts.app')

@section('content')
    <h1>Registrar Dulce</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ url('candies') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nombre del Producto:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Costo de Adquisición:</label>
            <input type="number" name="acquisition_cost" step="0.01" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Costo de Venta:</label>
            <input type="number" name="selling_price" step="0.01" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Unidades:</label>
            <input type="number" name="units" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar Dulce</button>
        <a href="{{ url('home') }}" class="btn btn-secondary">Regresar</a>
    </form>
@endsection
