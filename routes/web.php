<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Posts;
use App\Livewire\CreatePost;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profiles', [ProfileController::class, 'edit'])->name('settings.profile');
   
        Route::get('/posts', Posts::class)->name('posts');
        Route::get('/create-post', CreatePost::class)->name('posts.create');
        Route::get('/my-posts/{userId?}', App\Livewire\MyPosts::class)->name('user.posts');
        Route::get('/home', App\Livewire\HomePosts::class)->name('home');


    });

require __DIR__.'/auth.php';  
