@extends('layouts.app')

@section('content')
    <h1>Inventario de Dulces</h1>
    @if ($candies->isEmpty())
        <p>No hay dulces en el inventario.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Costo de Adquisición</th>
                    <th>Costo de Venta</th>
                    <th>Unidades</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($candies as $candy)
                    <tr>
                        <td>{{ $candy->name }}</td>
                        <td>{{ $candy->acquisition_cost }}</td>
                        <td>{{ $candy->selling_price }}</td>
                        <td>{{ $candy->units }}</td>
                        <td>
                            <a href="{{ route('candies.edit', $candy->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('candies.destroy', $candy->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    <a href="{{ url('home') }}" class="btn btn-secondary">Regresar</a>
@endsection
