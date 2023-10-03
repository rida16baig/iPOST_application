<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/practice', function () {
//     return view('practice');
// });

Route::get('/posts/create',[PostController::class,'create'])->name('post.create');
Route::post('/posts/create',[PostController::class,'store'])->name('post.store');
Route::get('/posts/read',[PostController::class,'read'])->name('post.read');
Route::delete('/posts/{id}/delete',[PostController::class,'delete'])->name('post.delete');
Route::get('/post/{id}/edit',[PostController::class,'edit'])->name('post.edit');
Route::put('/posts/{id}/update', [PostController::class, 'update'])->name('post.update');

