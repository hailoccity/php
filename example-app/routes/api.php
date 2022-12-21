<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
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
Route::get('posts',[\App\Http\Controllers\PostController::class, 'index']);
