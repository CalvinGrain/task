<?php

use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\User\NewsController;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\BlogsController as AdminBlogsController;
use Illuminate\Support\Facades\Route;


Route::inertia('/', 'Landing')->name('landing');

Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.single');

Route::get('/blog', [BlogController::class, 'index'])->name('blogs');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blogs.single');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    //Admin routes
    Route::resource('admin/news', AdminNewsController::class);
    Route::resource('admin/blogs', AdminBlogsController::class);
    Route::resource('admin/users', UsersController::class)->only(['index', 'show', 'update', 'destroy']);
    Route::resource('admin/roles', RolesController::class)->only(['index', 'show', 'update']);
});

