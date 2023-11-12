<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function index(){
        // Obtener todas las publicaciones del autor paginadas
        $posts = Post::where('user_id', auth()->id())->paginate(10);

        // Puedes personalizar la vista según tus necesidades
        return view('blog.index', compact('posts'));
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
