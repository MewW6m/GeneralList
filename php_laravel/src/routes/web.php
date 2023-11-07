<?php

use App\Http\Controllers\ApiController;
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

Route::get('/zaiko', function () {
    return view('zaiko/list');
})->middleware('auth');

Route::get('/zaiko/{id}', function () {
    return view('zaiko/detail');
})->middleware('auth');

Route::get('/api/zaiko/list', [ApiController::class, 'getList']);

Route::get('/api/zaiko', [ApiController::class, 'getDetail']);

Route::post('/api/zaiko', [ApiController::class, 'postDetail']);

Route::patch('/api/zaiko', [ApiController::class, 'patchDetail']);

Route::delete('/api/zaiko', [ApiController::class, 'deleteDetail']);

