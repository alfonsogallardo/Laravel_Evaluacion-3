<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;

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
Route::get('/posts/{post}',[HomeController::class,'show'])->name('post.show');
Route::get('/navigation', [HomeController::class, 'navigation'])->name('navigation');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/navigation', [BlogController::class, 'navigation'])->name('blog.navigation');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('/posts/navigation', [PostController::class, 'navigation'])->name('post.navigation');
// Rutas relacionadas con la creación, edición, actualización y eliminación de publicaciones
Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts', [PostController::class, 'store'])->name('post.store');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');
