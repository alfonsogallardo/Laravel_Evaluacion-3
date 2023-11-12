<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CreatePostController extends Controller
{
      /**
     * Muestra el formulario para crear una nueva publicación.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Almacena una nueva publicación en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Crear la nueva publicación asociada al usuario autenticado
        Auth::user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('user.posts')->with('success', 'Publicación creada exitosamente');
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
