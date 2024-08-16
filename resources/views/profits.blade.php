@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganancias</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: url('https://previews.123rf.com/images/peshkova/peshkova1804/peshkova180400802/99504989-creativo-fondo-de-pantalla-de-forex-brillante-inversi%C3%B3n-acciones-finanzas-an%C3%A1lisis-y-ganancias.jpg'); /* Reemplaza esta URL con la de tu imagen de fondo */
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .content {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
            border: 3px solid #ff6f61;
            text-align: center;
        }
        h1 {
            color: #ff6f61;
            font-size: 2rem;
            margin-bottom: 1.5rem;
        }
        .card {
            background-color: #fff5f5;
            border: 2px solid #ffb6c1;
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }
        .card-body {
            padding: 1.5rem;
        }
        h3 {
            color: #333;
            margin-bottom: 0.75rem;
            font-size: 1.25rem;
        }
        a.btn-secondary {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: #6c757d;
            color: #fff;
            border-radius: 10px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
        }
        a.btn-secondary:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Ganancias</h1>
        
        <div class="card">
            <div class="card-body">
                <h3>Gasto Total en compra de productos: ${{ number_format($totalAcquisitionCost, 2) }}</h3>
                <h3>Ingresos Totales de Ventas: ${{ number_format($totalRevenue, 2) }}</h3>
                <h3>Ganancia Total: ${{ number_format($totalProfit, 2) }}</h3>
            </div>
        </div>

        <a href="{{ url('home') }}" class="btn btn-secondary mt-3">Regresar</a>
    </div>
</body>
</html>
@endsection
