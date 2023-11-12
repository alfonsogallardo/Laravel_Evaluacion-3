<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CreatePostController;

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


Route::get('/',[HomeController::class,'index'])->name('home');

// Rutas relacionadas con la visualización de publicaciones
Route::get('/posts/{post}', [HomeController::class, 'show'])->name('home.post.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/navigation', [BlogController::class, 'navigation'])->name('blog.navigation');

Route::get('/posts/navigation', [PostController::class, 'navigation'])->name('post.navigation');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('post.update');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/register/navigation', [RegisterController::class, 'navigation'])->name('register.navigation');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/login/navigation', [LoginController::class, 'navigation'])->name('login.navigation');

Route::middleware(['auth'])->group(function () {
    Route::get('/user/posts', [UserController::class, 'showUserPosts'])->name('user.posts');
    Route::get('/posts/create', [CreatePostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [CreatePostController::class, 'store'])->name('posts.store');
});
