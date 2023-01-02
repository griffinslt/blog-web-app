<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfilePictureController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostPictureController;
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

Route::get('/post-picture-input/{user}/{post}', [PostPictureController::class, 'index'])->name('postPicture.index');
Route::post('/upload-post-picture/{post}', [PostPictureController::class, 'store'])->name('post-picture.store');
Route::delete('/posts/{post}/{picture}', [PostPictureController::class, 'destroy'])->name('post-picture.destroy');

Route::get('posts/category/{category}', [CategoryController::class, 'index'])->name('category');
Route::get('posts/{post}/add-category/{category}', [CategoryController::class, 'store'])->name('add-category');
Route::delete('posts/{post}/remove/{category}', [CategoryController::class, 'destroy'])->name('category_post.destroy');

Route::post('/posts/update', [PostController::class, 'update'])->name('posts.update');

Route::get('/posts/edits/{post}', [PostController::class, 'edit'])->name('posts.edits.edit');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.post');

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/users', [ProfileController::class, 'index'])->name('users.index');

Route::get('/users/{user}', [ProfileController::class, 'show'])->name('users.user');

Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('users.destroy');

require __DIR__ . '/auth.php';
