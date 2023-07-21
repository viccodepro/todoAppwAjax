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

Route::get('/', [TodoController::class, 'getIndex'])->name('home');
Route::get('/done/{id}', [TodoController::class, 'getDone'])->name('status');
Route::post('/add', [TodoController::class, 'postAdd'])->name('add_task');
Route::put('/update/{id}', [TodoController::class, 'postUpdate'])->name('update_task');
Route::delete('/delete/{id}', [TodoController::class, 'getDelete'])->name('delete_task');

