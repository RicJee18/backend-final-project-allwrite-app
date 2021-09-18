<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//follow Routes
Route::post('/follow/{user}', [App\Http\Controllers\FollowController::class, 'store']);

Route::get('/', [App\Http\Controllers\PostController::class, 'index']);
Route::get('/post/create',[App\Http\Controllers\PostController::class, 'create']);
Route::get('/post/{id}',[App\Http\Controllers\PostController::class, 'show']);
Route::post('/post',[App\Http\Controllers\PostController::class, 'store']);
Route::get('/delete/{id}', [App\Http\Controllers\PostController::class, 'delete']);
Route::get('/post/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
Route::patch('/post/{postId}', [App\Http\Controllers\PostController::class, 'update'])->name('posts.update');


// Profile Routes
Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

//Comment Routes
Route::post('/post/{post}/comments', [App\Http\Controllers\CommentController::class, 'store']);
Route::post('/reply/store', [App\Http\Controllers\CommentController::class, 'ReplyStore']);

//Home Routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Search Routes
Route::any('/search',function(){
    $q = Request::get ( 'q' );
    $user = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
    if(count($user) > 0)
    return view("search")->withDetails($user)->withQuery ( $q );
    else  
    return view("search")->with('error', 'no');
});

