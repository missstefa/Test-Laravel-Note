<?php

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get(
    '/',
    function () {
        return view('welcome');
    }
)->name('welcome');


Route::prefix('notes')->middleware(['auth:web'])->name('notes_')->group(
    function () {

        Route::get('/', [NoteController::class, 'index'])->name('index');

        Route::post('/', [NoteController::class, 'store'])->name('store');

        Route::get('/create', [NoteController::class, 'create'])->name('create');


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

Route::get('/profile',[ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile',[ProfileController::class, 'update'])->name('profile.update');