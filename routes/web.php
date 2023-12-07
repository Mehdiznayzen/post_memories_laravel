<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\memoriesController;


Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function(){
    Route::get('/show_memories', [memoriesController::class, 'show_memories'])->middleware('auth');
    Route::get('/create_memories', [memoriesController::class, 'create_memories'])->middleware('auth');
});

Route::post('/post_memorie', [memoriesController::class, 'post_memorie']);
Route::delete('/delete_memorie/{id}', [memoriesController::class, 'delete_memorie']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
