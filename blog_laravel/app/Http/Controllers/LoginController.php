<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   /**
     * Muestra el formulario de inicio de sesión.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Procesa el formulario de inicio de sesión.
     */
    public function login(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Intento de inicio de sesión
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home')->with('success', '¡Inicio de sesión exitoso!');
        }

        return back()->withErrors(['username' => 'Credenciales incorrectas'])->withInput();
    }

    /**
     * Cierra la sesión del usuario.
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('home')->with('success', '¡Sesión cerrada correctamente!');
    }

    /**
     * Muestra la barra de navegación.
     */
    public function navigation()
    {
        // Puedes personalizar la vista según tus necesidades
        return view('partials.navigation');
    }
}
