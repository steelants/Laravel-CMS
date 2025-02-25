<?php

use SteelAnts\LaravelCMS\Http\Controllers\AdminController;
use SteelAnts\LaravelCMS\Http\Controllers\PageController;
use SteelAnts\LaravelCMS\Http\Controllers\PostController;

Route::get('/page/{slug}', [PageController::class, 'show'])->middleware(['web', 'auth'])->name('cms.page.show');
Route::get('/posts', [PostController::class, 'index'])->middleware(['web', 'auth'])->name('cms.post.index');
Route::get('/post/{post_id}', [PostController::class, 'show'])->middleware(['web', 'auth'])->name('cms.post.show');

Route::get('/admin/pages', [AdminController::class, 'pages'])->middleware(['web', 'auth'])->name('cms.admin.pages');
Route::get('/admin/posts', [AdminController::class, 'posts'])->middleware(['web', 'auth'])->name('cms.admin.posts');


