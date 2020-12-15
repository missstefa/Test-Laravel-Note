<?php

use App\Http\Controllers\NoteController;
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

Route::get('/', function () {return view('welcome');})->name('welcome');



Route::middleware(['auth:web', 'can:view,note'])->group(function () {

Route::get('/notes', [NoteController::class, 'index'])->name('notes_index')->withoutMiddleware('can:view,note');

Route::post('/notes', [NoteController::class, 'store'])->name('notes_store')->withoutMiddleware('can:view,note');

Route::get('/notes/create', [NoteController::class, 'create'])->name('notes_create')->withoutMiddleware('can:view,note');

Route::get('/notes/{note}',[NoteController::class, 'show'])->name('notes_show');

Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->name('notes_edit');

Route::patch('/notes/{note}',[NoteController::class, 'update'])->name('notes_update');

Route::delete('/notes/{note}',[NoteController::class, 'delete'])->name('notes_delete');
});
