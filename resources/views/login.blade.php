@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: url('https://sotni.ru/wp-content/uploads/2023/08/sladosti-94.webp'); /* Reemplaza esta URL con la de tu imagen de fondo */
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
            max-width: 400px;
            width: 100%;
            border: 3px solid #ff6f61;
            text-align: center;
        }
        h1 {
            color: #ff6f61;
            font-size: 2rem;
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
        input[type="email"], input[type="password"] {
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
    </style>
</head>
<body>
    <div class="content">
        <h1>Inicio de sesión</h1>
        <form action="{{ url('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </form>
    </div>
</body>
</html>
@endsection
