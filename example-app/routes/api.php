<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', [\App\Http\Controllers\AuthController::class, 'sigin']);
Route::post('register', [\App\Http\Controllers\AuthController::class, 'signup']);

Route::group(['middleware' => ['auth']], function () {
    Route::resource('posts', PostController::class);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});

//Route::get('posts',[PostController::class, 'index'])->name('posts.index');
//Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
//Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
//Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
//Route::get('posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
//Route::put('/posts/{id}/update', [PostController::class, 'update'])->name('posts.update');
//Route::delete('/posts/{id}/destroy', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/test', [PostController::class, 'index_query']);
Route::get('/test/{id}', [PostController::class, 'get_index_id']);



//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index']);
Route::post('/admin', [\App\Http\Controllers\AdminController::class, 'store']);
Route::get('/admin/{id}', [\App\Http\Controllers\AdminController::class, 'delete']);
Route::delete('/admin/{id}', [\App\Http\Controllers\AdminController::class, 'show']);
Route::put('/admin/{id}', [\App\Http\Controllers\AdminController::class, 'edit']);
Route::post('/teacher', [\App\Http\Controllers\TeacherController::class, 'store']);
Route::post('/course', [\App\Http\Controllers\CourseController::class, 'store']);
Route::get('/course', [\App\Http\Controllers\CourseController::class, 'index']);
Route::get('/export', [\App\Http\Controllers\AdminController::class, 'export']);
Route::post('/import' ,[\App\Http\Controllers\AdminController::class, 'import']);
