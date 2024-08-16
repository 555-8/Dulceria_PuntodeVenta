<?php

namespace App\Http\Controllers;

use App\Models\Candy;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{

    
    public function showRegisterForm()
    {
        return view('register');
    }

    
    public function showLoginForm()
    {
        return view('login');
    }

    public function showHomePage()
    {
        return view('home');
    }

    public function showCandyForm()
    {
        return view('candies');
    }

    public function showSalesForm()
    {
        return view('sales');
    }

    public function showProfits()
    {
        return view('profits');
    }

    public function showInventory()
    {
        $candies = Candy::all(); // Obtener todos los dulces
        return view('inventory', compact('candies'));
    }

   // Mostrar la página de ganancias
   public function showProfitPage()
   {
       $totalProfit = 0;

       // Obtener todas las ventas
       $sales = Sale::all();

       // Calcular la ganancia para cada venta
       foreach ($sales as $sale) {
           $candy = Candy::find($sale->candy_id); // Obtener el dulce basado en candy_id
           if ($candy) {
               $cost = $candy->acquisition_cost * $sale->units_sold;
               $revenue = $sale->total_revenue; // Usar total_revenue directamente desde la venta
               $profit = $revenue - $cost;
               $totalProfit += $profit;
           }
       }

       // Calcular el costo total de adquisición (para información)
       $totalAcquisitionCost = Candy::sum(DB::raw('acquisition_cost * units'));

       // Calcular los ingresos totales de las ventas (para información)
       $totalRevenue = Sale::sum('total_revenue');

       return view('profits', compact('totalAcquisitionCost', 'totalRevenue', 'totalProfit'));
   }

}
