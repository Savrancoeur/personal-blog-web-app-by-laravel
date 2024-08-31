<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// UI
Route::get('/', [App\Http\Controllers\UiController::class, 'index']);
Route::get('/posts', [App\Http\Controllers\UiController::class, 'postIndex']);
Route::get('/posts/{id}/details', [App\Http\Controllers\UiController::class, 'postDetailsIndex']);
Route::get('/search_posts', [App\Http\Controllers\UiController::class, 'search']);
Route::get('/search_posts_by_category/{catId}', [App\Http\Controllers\UiController::class, 'searchByCategory']);

// Like & Dislike
Route::post('/posts/like/{postId}', [App\Http\Controllers\LikeDislikeController::class, 'like']);
Route::post('/posts/dislike/{postId}', [App\Http\Controllers\LikeDislikeController::class, 'dislike']);

// Comment
Route::post('/posts/comment/{postId}', [App\Http\Controllers\CommentController::class, 'comment']);

// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin']], function () {
    Route::get('/dashboard', [App\Http\Controllers\admin\AdminDashboardController::class, 'index']);

    //user
    Route::get('/users', [App\Http\Controllers\admin\UserController::class, 'index']);
    Route::get('/users/{id}/edit', [App\Http\Controllers\admin\UserController::class, 'edit']);
    Route::patch('/users/{id}/update', [App\Http\Controllers\admin\UserController::class, 'update']);
    Route::post('/users/{id}/delete', [App\Http\Controllers\admin\UserController::class, 'delete']);

    //skill
    Route::resource('skills', App\Http\Controllers\admin\SkillController::class);

    //project
    Route::resource('projects', App\Http\Controllers\admin\ProjectController::class);

    //client count
    Route::get('client_counts', [App\Http\Controllers\admin\ClientCountController::class, 'index'])->name('client_counts.index');
    Route::post('client_counts/store', [App\Http\Controllers\admin\ClientCountController::class, 'store'])->name('client_counts.store');
    Route::post('client_counts/{id}/update', [App\Http\Controllers\admin\ClientCountController::class, 'update'])->name('client_counts.update');

    //category
    Route::resource('categories', App\Http\Controllers\admin\CategoryController::class);

    //post
    Route::resource('posts', App\Http\Controllers\admin\PostController::class);
    Route::post('comment/{commentId}/show_hide', [App\Http\Controllers\admin\PostController::class, 'showHideComment']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
