<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profit;


class ProfitController extends Controller
{
    //
    public function index()
{
    $profit = Profit::latest()->first();
    return response()->json($profit);
}
}
