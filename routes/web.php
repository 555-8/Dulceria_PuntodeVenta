<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandyController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;



Route::get('register', function () {
    return view('auth.register');
})->name('register');

Route::post('register', [AuthController::class, 'register'])->name('register.submit');
Route::get('register', [WebController::class, 'showRegisterForm']);

// Ruta para mostrar el formulario de registro
Route::get('register', function () {
    return view('auth.register');
})->name('register');

// Ruta para manejar el registro de usuarios
Route::post('register', [AuthController::class, 'register'])->name('register.submit');


// Ruta para mostrar el formulario de login
Route::get('login', function () {
    return view('login');
})->name('login');

// Ruta para manejar el login (POST)
Route::post('login', [AuthController::class, 'login']);

// Ruta para manejar el logout (POST)
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::get('home', [WebController::class, 'showHomePage'])->name('home');
    Route::get('candies', [WebController::class, 'showCandyForm'])->name('candies');
    Route::get('sales', [WebController::class, 'showSaleForm'])->name('sales');
    Route::get('profits', [WebController::class, 'showProfitPage'])->name('profits');
    // Otras rutas protegidas
});
Route::get('candies', [WebController::class, 'showCandyForm'])->name('candies');

Route::post('candies', [CandyController::class, 'store'])->middleware('auth');
Route::get('inventory', [WebController::class, 'showInventory'])->name('inventory')->middleware('auth');

// Mostrar formulario para registrar ventas
Route::get('sales', [SaleController::class, 'showSaleForm'])->name('sales')->middleware('auth');

// Registrar una venta
Route::post('sales', [SaleController::class, 'store'])->middleware('auth');

// Ruta para el registro de usuarios
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

//ganancias
Route::get('/profits', [WebController::class, 'showProfitPage'])->name('profits')->middleware('auth');


// Mostrar el formulario para editar un dulce
Route::get('candies/{id}/edit', [CandyController::class, 'edit'])->name('candies.edit');

// Actualizar un dulce
Route::put('candies/{id}', [CandyController::class, 'update'])->name('candies.update');

// Eliminar un dulce
Route::delete('candies/{id}', [CandyController::class, 'destroy'])->name('candies.destroy');





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
