<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Models\Article;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('welcome');
});

// Admin pages

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        });

        Route::prefix('categories') //
            ->as('categories.')
            ->group(function(){
                Route::get('/',                 [CategoryController::class, 'index'])->name('index');

                Route::post('/',                [CategoryController::class, 'store'])->name('store');

                Route::get('create',            [CategoryController::class, 'create'])->name('create');

                Route::get('{category}',        [CategoryController::class, 'show'])->name('show');

                Route::put('{category}',        [CategoryController::class, 'update'])->name('update');

                Route::get('{category}/edit',   [CategoryController::class, 'edit'])->name('edit');

                Route::delete('{category}',     [CategoryController::class, 'destroy'])->name('destroy');
            });

        Route::resource('article', ArticleController::class);

    });


// Route::resource('categories' , CategoryController::class);

Auth::routes();

Route::prefix('article')
    ->as('article.')
    ->group(function () {

        Route::get('create',            [HomeController::class, 'create'])->name('create');

        Route::post('/',                [HomeController::class, 'store'])->name('store');

        Route::get('{article}/show',    [HomeController::class, 'show'])->name('show');

        Route::get('{user}/manager', [HomeController::class, 'manage'])->name('manage');

        Route::get('{article}/edit', [HomeController::class, 'edit'])->name('edit');

        Route::put('{article}/',    [HomeController::class, 'update'])->name('update');

        Route::delete('{article}/',    [HomeController::class, 'destroy'])->name('destroy');

        Route::post('/{article}/comment',          [CommentController::class, 'store'])->name('comment');


    });



Route::get('/', [HomeController::class, 'showHome'])->name('home');
