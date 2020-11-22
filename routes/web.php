<?php

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

Route::get('/', function () {
    return view('welcome');
});





Route::get('/notes', [\App\Http\Controllers\NoteController::class, 'index'])->name('notes_index');

Route::post('/notes', [\App\Http\Controllers\NoteController::class, 'store'])->name('notes_store');

Route::get('/notes/create', [\App\Http\Controllers\NoteController::class, 'create'])->name('notes_create');

Route::get('/notes/{note}',[\App\Http\Controllers\NoteController::class, 'show'])->name('notes_show');

Route::get('/notes/{note}/edit', [\App\Http\Controllers\NoteController::class, 'edit'])->name('notes_edit');

Route::patch('/notes/{note}',[\App\Http\Controllers\NoteController::class, 'update'])->name('notes_update');

Route::delete('/notes/{note}',[\App\Http\Controllers\NoteController::class, 'delete'])->name('notes_delete');