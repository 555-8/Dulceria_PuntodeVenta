@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar venta</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: url('https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Zm9uZG8lMjBkZSUyMGRpbmVyb3xlbnwwfHwwfHx8MA%3D%3D'); /* Reemplaza esta URL con la de tu imagen de fondo */
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .content {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
            border: 3px solid #ff6f61;
        }
        h1 {
            color: #ff6f61;
            font-size: 2rem;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .alert-danger {
            color: #fff;
            background-color: #dc3545;
            padding: 1rem;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .alert-success {
            color: #fff;
            background-color: #28a745;
            padding: 1rem;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
            font-weight: bold;
        }
        select, input[type="number"] {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #ffb6c1;
            border-radius: 10px;
            font-size: 1rem;
            background-color: #fff5f5;
        }
        button.btn-primary {
            width: 100%;
            padding: 0.75rem;
            background-color: #ff6f61;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        button.btn-primary:hover {
            background-color: #ff3e3e;
            transform: translateY(-2px);
        }
        a.btn-secondary {
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 1rem;
            padding: 0.75rem;
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
        <h1>Registrar venta</h1>
        
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
                <label>Nombre del producto:</label>
                <select name="candy_id" class="form-control" required>
                    <option value="">Seleccione un producto</option>
                    @foreach ($candies as $candy)
                        <option value="{{ $candy->id }}">{{ $candy->name }} ({{ $candy->units }} unidades)</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Unidades vendidas:</label>
                <input type="number" name="units_sold" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar venta</button>
            <a href="{{ url('home') }}" class="btn btn-secondary">Regresar</a>
        </form>
    </div>
</body>
</html>
@endsection
