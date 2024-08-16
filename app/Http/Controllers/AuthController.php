<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function showRegistrationForm()
    {
        return view('register'); // Asegúrate de tener una vista llamada 'register' en la carpeta 'resources/views/auth'
    }

   // Método para manejar el registro de usuarios
   public function register(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
    ]);

    $user = User::create([
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Autenticar al usuario recién registrado
    Auth::login($user); // Esta línea autentica al usuario recién registrado

    // Redirigir al usuario a la página principal
    return redirect()->intended('home');
}


public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $token = $user->createToken('Personal Access Token')->plainTextToken;

        // Redirigir al usuario a la página principal
        return redirect()->intended('home');
    }

    return back()->withErrors([
        'email' => 'Las credenciales no coinciden con nuestros registros.',
    ]);
}

public function logout(Request $request)
{
    Auth::logout();
    return redirect('login');
}

}
