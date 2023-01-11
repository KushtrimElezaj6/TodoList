<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::get('/', [Todocontroller::class, 'index']);
Route::get('/todo/{todo}', [Todocontroller::class, 'edit']);
Route::post('/todo', [Todocontroller::class, 'store'])->name('todo');
Route::patch('/todo/{todo}', [Todocontroller::class, 'update']);
Route::delete('/todo/{todo}', [Todocontroller::class, 'destroy']);
Route::patch('/todo/{todo}/completed', [TodoController::class, 'completed']);