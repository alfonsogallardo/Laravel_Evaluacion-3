<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
     /**
     * Muestra el formulario de registro.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Procesa el formulario de registro.
     */
    public function register(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'username' => 'required|string|max:20|unique:users',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crear el nuevo usuario
        $user = User::create([
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Iniciar sesión automáticamente después del registro
        Auth::login($user);

        return redirect()->route('home')->with('success', '¡Registro exitoso!');
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
