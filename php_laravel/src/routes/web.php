<?php

use App\Http\Controllers\ZaikoController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/zaiko/list', [ZaikoController::class, 'getList'])->withoutMiddleware([VerifyCsrfToken::class]);

Route::get('/api/zaiko', [ZaikoController::class, 'getDetail'])->withoutMiddleware([VerifyCsrfToken::class]);

Route::post('/api/zaiko', [ZaikoController::class, 'postDetail'])->withoutMiddleware([VerifyCsrfToken::class]);

Route::patch('/api/zaiko', [ZaikoController::class, 'patchDetail'])->withoutMiddleware([VerifyCsrfToken::class]);

Route::delete('/api/zaiko', [ZaikoController::class, 'deleteDetail'])->withoutMiddleware([VerifyCsrfToken::class]);

