<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleLikeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
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
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::middleware(['auth:web'])->group(
    function () {
        Route::prefix('notes')->name('notes.')->group(
            function () {
                Route::get('/', [NoteController::class, 'index'])->name('index');

                Route::post('/', [NoteController::class, 'store'])->name('store');


                Route::middleware('can:view,note')->group(
                    function () {
                        Route::get('/{note}', [NoteController::class, 'show'])->name('show');

                        Route::get('/{note}/edit', [NoteController::class, 'edit'])->name('edit');

                        Route::patch('/{note}', [NoteController::class, 'update'])->name('update');

                        Route::delete('/{note}', [NoteController::class, 'delete'])->name('delete');
                    }
                );
            }
        );

        Route::prefix('profile')->name('profile.')->group(
            function () {
                Route::get('/', [ProfileController::class, 'edit'])->name('edit');
                Route::post('/', [ProfileController::class, 'update'])->name('update');
            }
        );
    }
);

Route::prefix('articles')->name('articles.')->group(
    function () {
        Route::get('/create', [ArticleController::class, 'create'])->name('create');
        Route::post('/', [ArticleController::class, 'store'])->name('store');
        Route::get('/{article}', [ArticleController::class, 'show'])->name('show');
        Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('edit');
        Route::patch('/{article}', [ArticleController::class, 'update'])->name('update');
        Route::delete('/{article}', [ArticleController::class, 'delete'])->name('delete');
    }
);

Route::get('articles/{article}/notes/create', [NoteController::class, 'create'])->name('notes.create');

Route::post('articles/{article}/likes', [ArticleLikeController::class, 'store'])->name('likes.store');
