<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ComentarioController;



Route::get('/',HomeController::class)->name('home');


// registro
Route::get('/register', [RegisterController::class,'registro'])->name('register');
Route::post('/register', [RegisterController::class,'store']);

// login
route::get('/login',[LoginController::class,'index'])->name('login');
route::post('/login',[LoginController::class,'store']);

// Logout
route::post('/logout',[LogoutController::class,'store'])->name('logout');
// rutas para el perfil
Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');



// publicaciones
Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');


// borrar publicacion
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// imagenes
Route::post('/imagenes',[ImagenController::class, 'store'])->name('imagenes.store');

// likes
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');
// comentarios
Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/{user:username}',[PostController::class, 'index'])->name('posts.index');

// siguiendo usuarios
Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unfollow');













