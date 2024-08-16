@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: url('https://p4.wallpaperbetter.com/wallpaper/248/714/401/eggs-colorful-candy-easter-wood-hd-wallpaper-preview.jpg'); /* Reemplaza esta URL con la de tu imagen de fondo */
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
            max-width: 600px;
            width: 100%;
            text-align: center;
            border: 3px solid #ff6f61;
        }
        h1 {
            color: #ff6f61;
            font-size: 2.5rem;
            margin-bottom: 2rem;
        }
        .nav {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        .nav-link {
            text-decoration: none;
            padding: 1rem;
            border-radius: 10px;
            background-color: #ffb6c1;
            color: #fff;
            font-weight: bold;
            font-size: 1.2rem;
            transition: background-color 0.3s, transform 0.3s;
        }
        .nav-link:hover {
            background-color: #ff6f61;
            transform: translateY(-2px);
        }
        .btn-link {
            background-color: transparent;
            color: #ff6f61;
            border: none;
            font-weight: bold;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 1rem;
            transition: color 0.3s;
        }
        .btn-link:hover {
            color: #ff3e3e;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Página Principal</h1>
        <nav class="nav">
            <a class="nav-link" href="{{ url('candies') }}">Registrar dulces</a>
            <a class="nav-link" href="{{ url('sales') }}">Registrar ventas</a>
            <a class="nav-link" href="{{ url('profits') }}">Ver ganancias</a>
            <a class="nav-link" href="{{ url('inventory') }}">Ver inventario</a>

            <form action="{{ url('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-link">Cerrar sesión</button>
            </form>
        </nav>
    </div>
</body>
</html>
@endsection
