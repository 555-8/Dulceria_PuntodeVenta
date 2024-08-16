@extends('layouts.app')

@section('content')
    <h1>Inicio de sesión</h1>
    <form action="{{ url('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Contraseña:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
    </form>
@endsection
