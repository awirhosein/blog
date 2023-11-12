<?php

use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;


// heeeey
Route::namespace(Admin::class)->as('admin.')->group(function () {
    Route::view('dashboard', 'admin.pages.index')->name('dashboard');

    Route::middleware('admin')->group(function () {
        Route::resource('users', UserController::class);

        Route::get('users/{user}/article-access', [Admin\ArticleAccessController::class, 'edit'])->name('users.article-access.edit');
        Route::put('users/{user}/article-access', [Admin\ArticleAccessController::class, 'update'])->name('users.article-access.update');
    });

    Route::resource('articles', ArticleController::class)->middleware('can:article,article');
});
