<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Muestra los detalles de una publicación.
     */
    public function show(Post $post)
    {
        // Puedes personalizar la vista según tus necesidades
        return view('post.show', compact('post'));
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
     * Muestra la página para crear una nueva publicación.
     */
    public function create()
    {
        // Puedes personalizar la vista según tus necesidades
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

        // Crear la nueva publicación
        $post = auth()->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('post.show', $post->id)
            ->with('success', 'Publicación creada exitosamente');
    }

    /**
     * Muestra la página para editar una publicación existente.
     */
    public function edit(Post $post)
    {
        // Puedes personalizar la vista según tus necesidades
        return view('post.edit', compact('post'));
    }

    /**
     * Actualiza una publicación existente en la base de datos.
     */
    public function update(Request $request, Post $post)
    {
        // Validación de los datos del formulario
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Actualizar la publicación
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('post.show', $post->id)
            ->with('success', 'Publicación actualizada exitosamente');
    }

    /**
     * Elimina una publicación de la base de datos.
     */
    public function destroy(Post $post)
    {
        // Eliminar la publicación
        $post->delete();

        return redirect()->route('blog.index')
            ->with('success', 'Publicación eliminada exitosamente');
    }
}
