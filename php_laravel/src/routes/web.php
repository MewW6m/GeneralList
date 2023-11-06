<?php

use App\Http\Controllers\ApiController;
use App\Http\Middleware\VerifyCsrfToken;
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

Route::get('/api/zaiko/list', [ApiController::class, 'getList'])->withoutMiddleware([VerifyCsrfToken::class]);

Route::get('/api/zaiko', [ApiController::class, 'getDetail'])->withoutMiddleware([VerifyCsrfToken::class]);

Route::post('/api/zaiko', [ApiController::class, 'postDetail'])->withoutMiddleware([VerifyCsrfToken::class]);

Route::patch('/api/zaiko', [ApiController::class, 'patchDetail'])->withoutMiddleware([VerifyCsrfToken::class]);

Route::delete('/api/zaiko', [ApiController::class, 'deleteDetail'])->withoutMiddleware([VerifyCsrfToken::class]);

