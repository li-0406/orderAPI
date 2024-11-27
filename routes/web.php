<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CSRFController;
use App\Livewire\Navbar;
use App\Livewire\CreatePost;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);

Route::get('/room', function() {
    return view('room');
});

Route::get('/hello', function() {
    return view('hello');
});

Route::get('/dog', [DogController::class, 'getDogInfo']);

Route::get('/post', [UserController::class, 'createPost']);

Route::get('/main', [Navbar::class, 'render']);

Route::get('/create-post', CreatePost::class);

Route::post('/posts', [PostController::class, 'store']);

Route::get('/getCSRFToken', [CSRFController::class, 'getCSRFController']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
