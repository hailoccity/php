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


//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('/users', [\App\Http\Controllers\User\UserController::class, 'index'])->middleware('role');
Route::post('/users', [\App\Http\Controllers\User\UserController::class, 'store']);
Route::delete('/users/{id}', [\App\Http\Controllers\User\UserController::class, 'delete']);
Route::get('/users/{id}', [\App\Http\Controllers\User\UserController::class, 'show']);
Route::put('/users/{id}', [\App\Http\Controllers\User\UserController::class, 'edit']);
//Route::post('/teacher', [\App\Http\Controllers\TeacherController::class, 'store']);
//Route::post('/course', [\App\Http\Controllers\CourseController::class, 'store']);
//Route::get('/course', [\App\Http\Controllers\CourseController::class, 'index']);
//Route::get('/export', [\App\Http\Controllers\AdminController::class, 'export']);
//Route::post('/import' ,[\App\Http\Controllers\AdminController::class, 'import']);


