<?php

namespace App\Http\Controllers;

use App\Models\Candy;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    // Mostrar el formulario para registrar una venta
    public function showSaleForm()
    {
        // Obtener todos los dulces para mostrarlos en el formulario
        $candies = Candy::all();
        return view('sales', compact('candies'));
    }

    // Registrar una venta
    public function store(Request $request)
    {
        // Validar la entrada
        $validated = $request->validate([
            'candy_id' => 'required|exists:candies,id',
            'units_sold' => 'required|integer|min:1',
        ]);

        // Obtener el dulce
        $candy = Candy::find($validated['candy_id']);

        // Verificar si hay suficientes unidades disponibles
        if ($candy->units < $validated['units_sold']) {
            return redirect()->back()->with('error', 'No hay suficientes unidades disponibles. Solo quedan ' . $candy->units . ' unidades.');
        }

        // Registrar la venta dentro de una transacción
        DB::transaction(function () use ($candy, $validated) {
            // Crear una venta
            Sale::create([
                'candy_id' => $candy->id,
                'units_sold' => $validated['units_sold'],
                'total_revenue' => $candy->selling_price * $validated['units_sold'],
            ]);

            // Actualizar el inventario
            $candy->decrement('units', $validated['units_sold']);
        });

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('sales')->with('success', 'Venta registrada con éxito.');
    }
}
