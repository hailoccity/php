<?php

use App\Http\Controllers\ExpensesController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');

//Route::get('/test', function (){
//    return "<h2>Hello</h2>";
//});
Route::get('/expenses', [ExpensesController::class, 'index'])->name('expenses.index');

Route::get('/email/send', [\App\Http\Controllers\MailController::class, 'send'])->name('emails.demoMail');
Route::get('/email/show', [\App\Http\Controllers\MailController::class, 'show'])->name('emails.show');

Route::get('posts',[\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::post('/posts/store', [\App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
Route::get('posts/{id}/edit', [\App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}/update', [\App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{id}/destroy', [\App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');
