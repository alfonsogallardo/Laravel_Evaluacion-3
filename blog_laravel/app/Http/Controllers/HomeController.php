<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
     /**
     * Muestra la página de inicio con las publicaciones recientes.
     */
    public function index(){
         // Obtener las publicaciones más recientes desde la base de datos
         $recentPosts = Post::latest()->limit(5)->get();

         // Puedes personalizar la vista según tus necesidades
         return view('home', compact('recentPosts'));

    }//

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
}
