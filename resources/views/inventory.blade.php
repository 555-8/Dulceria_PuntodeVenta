@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Dulces</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: url('https://mlti.com.mx/wp-content/uploads/2023/10/generado-ia-foto-generativa-ia-almacen-existencias-envio-envios-fabrica-existencias-arte-grafico-1-1024x512.jpg'); /* Reemplaza esta URL con la de tu imagen de fondo */
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 2rem;
        }
        .content {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 1000px;
            width: 100%;
            border: 3px solid #ff6f61;
        }
        h1 {
            color: #ff6f61;
            font-size: 2rem;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        p {
            color: #333;
            font-size: 1.2rem;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .table {
            width: 100%;
            margin-bottom: 1.5rem;
            border-collapse: collapse;
        }
        .table th, .table td {
            padding: 1rem;
            text-align: center;
            border-bottom: 2px solid #ffb6c1;
        }
        .table th {
            background-color: #ff6f61;
            color: #fff;
            font-weight: bold;
        }
        .table td {
            background-color: #fff5f5;
            color: #333;
        }
        .btn-primary, .btn-danger, .btn-secondary {
            padding: 0.5rem 1rem;
            border-radius: 10px;
            text-decoration: none;
            color: #fff;
            font-size: 1rem;
            display: inline-block;
            transition: background-color 0.3s, transform 0.3s;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #28a745;
            margin-right: 0.5rem;
        }
        .btn-primary:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            transform: translateY(-2px);
        }
        .btn-secondary {
            background-color: #6c757d;
            margin-top: 1rem;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
        }
        .no-inventory {
            font-size: 1.25rem;
            color: #333;
            text-align: center;
            margin-top: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Inventario de Dulces</h1>
        @if ($candies->isEmpty())
            <p class="no-inventory">No hay dulces en el inventario.</p>
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
                            <td>${{ number_format($candy->acquisition_cost, 2) }}</td>
                            <td>${{ number_format($candy->selling_price, 2) }}</td>
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
    </div>
</body>
</html>
@endsection
