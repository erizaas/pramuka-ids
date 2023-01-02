<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PramukaController;
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

// Route::get('/test', function () {
//     return view('admin.dashboard');
// });

Route::get('/logout', [PramukaController::class, 'logout']);

Route::middleware('isPublic')->group(function () {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::middleware('isLogin')->group(function () {
    Route::get('/', [PramukaController::class, 'index']);
    Route::get('/admin/page/show', [PramukaController::class, 'show']);
    Route::get('/admin/edit/{id}', [PramukaController::class, 'edit']);
    Route::post('/store/{id}', [PramukaController::class, 'store']);
    Route::delete('/delete/{id}', [PramukaController::class, 'delete']);
    Route::patch('/update/{id}', [PramukaController::class, 'update']);
    Route::delete('/destroy/{id}', [PramukaController::class, 'destroy']);
    Route::post('/create', [PramukaController::class, 'create']);
    Route::get('/admin/create', [PramukaController::class, 'create_pages']);
    Route::get('/admin', [PramukaController::class, 'admin']);
    Route::get('/pages/{link}', [PramukaController::class, 'pages']);
});
