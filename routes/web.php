<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware gro;;vlassup. Now create something great!
|
*/
Route::get('/user_profiles', [UserProfileController::class, "index"])
     ->middleware(['auth', 'verified'])->name('user_profiles.index');

Route::get('/user_profiles/create', [UserProfileController::class, "create"])
     ->middleware(['auth', 'verified'])->name('user_profiles.create');
     
Route::post('/user_profiles/store', [UserProfileController::class, "store"])
     ->middleware(['auth', 'verified'])->name('user_profiles.store');   
     

Route::get('/user_profiles/{id}', [UserProfileController::class, "show"])
     ->middleware(['auth', 'verified'])->name("user_profiles.show");

Route::get('/posts', [PostController::class, "index"])
     ->middleware(['auth', 'verified'])->name('posts.index');

Route::get('/posts/create', [PostController::class, "create"])
     ->middleware(['auth', 'verified'])->name('posts.create');

Route::post('/posts/store', [PostController::class, "store"])
->middleware(['auth', 'verified'])->name("posts.store");

Route::get('/posts/edit/{id}', [PostController::class, "edit"])
->middleware(['auth', 'verified'])->name('posts.edit');

Route::post('/posts/update/{id}', [PostController::class, "update"])
->middleware(['auth', 'verified'])->name("posts.update");

Route::get('/posts/{id}', [PostController::class, "show"])
->middleware(['auth', 'verified'])->name("posts.show");

Route::delete('/posts/{id}', [PostController::class, "destroy"])
->middleware(['auth', 'verified'])->name("posts.destroy");

Route::get('/comments/create/{postId}', [CommentController::class, "create"])
     ->middleware(['auth', 'verified'])->name('comments.create');

Route::post('/comments/store/{postId}', [CommentController::class, "store"])
->middleware(['auth', 'verified'])->name("comments.store");

Route::get('/comments/edit/{id}', [CommentController::class, "edit"])
->middleware(['auth', 'verified'])->name('comments.edit');

Route::post('/comments/update/{id}', [CommentController::class, "update"])
->middleware(['auth', 'verified'])->name("comments.update");

Route::delete('/comments/{id}', [CommentController::class, "destroy"])
->middleware(['auth', 'verified'])->name("comments.destroy");

Route::get('/comments/like/{id}', [CommentController::class, "like"])
->middleware(['auth', 'verified'])->name("comments.like");


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
