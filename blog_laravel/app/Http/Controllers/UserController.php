<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
  /**
     * Muestra el panel de control del usuario.
     */
    public function showDashboard()
    {
        $user = Auth::user();

        // Puedes personalizar la vista según tus necesidades
        return view('user.dashboard', compact('user'));
    }

    /**
     * Muestra la barra de navegación.
     */
    public function navigation()
    {
        // Puedes personalizar la vista según tus necesidades
        return view('partials.navigation');
    }

    /**
     * Muestra la lista de publicaciones del usuario con opciones para editar o eliminar.
     */
    public function showUserPosts()
    {
        $user = Auth::user();
        $posts = $user->posts;

        // Puedes personalizar la vista según tus necesidades
        return view('user.posts', compact('user', 'posts'));
    }
}

