<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfilePictureController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('loginOrRegister');
})->name('loginOrRegister');

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/profile-picture-input/{user}', [ProfilePictureController::class, 'index'])->name('profilePicture.index');
Route::post('/upload-profile-picture/{user}', [ProfilePictureController::class, 'store'])->name('profilePicture.store');

Route::post('/posts', [CommentController::class, 'store'])->name('comments.store');

Route::delete('/posts/{post}', [CommentController::class, 'destroy'])->name('comments.destroy');

Route::post('/posts/update', [PostController::class, 'update'])->name('posts.update');

Route::get('/posts/edits/{post}', [PostController::class, 'edit'])->name('posts.edits.edit');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.post');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/users/{user}', [UserController::class, 'show'])->name('users.user');


require __DIR__ . '/auth.php';
