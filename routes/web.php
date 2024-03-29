<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReceivedLikeController;
use App\Http\Jokes;

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

app()->singleton("App\Http\Jokes", function ($app){
     return new Jokes("lZ+CtLk3jtLsFyhovM13gw==Mw1J4mJBv83byiNf",
      "https://api.api-ninjas.com/v1/jokes?limit=1");
});

Route::get('/user_profiles', [UserProfileController::class, "index"])
     ->middleware(['auth', 'verified'])->name('user_profiles.index');

Route::get('/user_profiles/create', [UserProfileController::class, "create"])
     ->middleware(['auth', 'verified'])->name('user_profiles.create');
     
Route::post('/user_profiles/store', [UserProfileController::class, "store"])
     ->middleware(['auth', 'verified'])->name('user_profiles.store');   

Route::get('/user_profiles/edit/{id}', [UserProfileController::class, "edit"])
     ->middleware(['auth', 'verified'])->name('user_profiles.edit');

Route::post('/user_profiles/update/{id}', [UserProfileController::class, "update"])
     ->middleware(['auth', 'verified'])->name("user_profiles.update");

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

Route::get('/posts/like/{id}', [PostController::class, "like"])
->middleware(['auth', 'verified'])->name("posts.like");

Route::get('/send-receivedlike/{likeableType}/{likeableId}', [ReceivedLikeController::class,
 'sendLikeNotification'])->middleware(['auth', 'verified'])->name("send_like");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
