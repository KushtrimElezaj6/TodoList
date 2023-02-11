<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoController;
use App\Http\Controllers\TagController;

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


Route::get('/', [Todocontroller::class, 'index'])->name('todo.index');
Route::get('/todo/edit/{todo}', [Todocontroller::class, 'edit']);
Route::post('/todo', [Todocontroller::class, 'store']);
Route::patch('/todo/{todo}', [Todocontroller::class, 'update']);
Route::delete('/todo/{todo}', [Todocontroller::class, 'destroy']);
Route::patch('/todo/{todo}/completed', [TodoController::class, 'completed']);


Route::get('/tags', [Tagcontroller::class, 'index'])->name('tags.index');
Route::post('/tags', [Tagcontroller::class, 'store']);
Route::delete('/tags/{tag}', [Tagcontroller::class, 'destroy']);
Route::get('/tags/edit/{tag}', [Tagcontroller::class, 'edit']);
Route::patch('/tags/{tag}', [Tagcontroller::class, 'update']);

});






require __DIR__.'/auth.php';