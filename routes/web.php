<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Models\Post;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PostController::class, 'index']);
Route::get('/dashboard', function () {
    $posts = Post::with('category')->get();
    $posts = Post::paginate(6);
    return view('dashboard', compact('posts'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route for category
    Route::get('category/create', [CategoryController::class, 'create'])->name('create.category');
    Route::post('category/store', [CategoryController::class, 'store'])->name('store.category');
    Route::get('category/liste', [CategoryController::class, 'liste'])->name('liste.category');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('edit.category');
    Route::get('category/update/{id}', [CategoryController::class, 'update'])->name('update.category');
    Route::get('category/supprimé/{id}', [CategoryController::class, 'destroy'])->name('delete.category');
    Route::delete('category/toutsupprimé', [CategoryController::class, 'destroyall'])->name('deleteall.category');

    // Route for post
    Route::get('/post/create', [PostController::class, 'create'])->name('create.post');
    Route::post('/post/store', [PostController::class, 'store'])->name('store.post');
});

require __DIR__ . '/auth.php';
