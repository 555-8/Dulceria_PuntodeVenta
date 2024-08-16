@extends('layouts.app')

@section('content')
    <h1>Editar Dulce</h1>
    <form action="{{ route('candies.update', $candy->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="name" class="form-control" value="{{ $candy->name }}" required>
        </div>
        <div class="form-group">
            <label>Costo de Adquisición:</label>
            <input type="number" name="acquisition_cost" class="form-control" value="{{ $candy->acquisition_cost }}" step="0.01" required>
        </div>
        <div class="form-group">
            <label>Costo de Venta:</label>
            <input type="number" name="selling_price" class="form-control" value="{{ $candy->selling_price }}" step="0.01" required>
        </div>
        <div class="form-group">
            <label>Unidades:</label>
            <input type="number" name="units" class="form-control" value="{{ $candy->units }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Dulce</button>
    </form>
    <a href="{{ route('inventory') }}" class="btn btn-secondary">Regresar</a>
@endsection
