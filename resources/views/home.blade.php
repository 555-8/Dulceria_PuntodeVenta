@extends('layouts.app')

@section('content')
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
@endsection
