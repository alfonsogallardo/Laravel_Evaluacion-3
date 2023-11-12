<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user(); // Obtener el usuario autenticado
        $posts = $user->posts; // Obtener las publicaciones del usuario
        return view('users.dashboard', compact('user', 'posts'));
    }

    public function createPostForm()
    {
        return view('users.create-post');
    }

    public function storePost(Request $request)
    {
        // Validación de datos del formulario
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Crear una nueva publicación para el usuario autenticado
        $user = auth()->user();
        $post = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        $user->posts()->save($post);

        return redirect()->route('dashboard')->with('success', 'Publicación creada exitosamente.');
    }
}
