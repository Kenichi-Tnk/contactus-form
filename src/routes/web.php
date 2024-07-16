<?php

use App\Http\Controllers\ContactUsController;
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

Route::get('/', [ContactUsController::class, 'index']);
Route::POST('/confirm', [ContactUsController::class, 'confirm']);
Route::POST('/thanks', [ContactUsController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/admin', [ContactUsController::class, 'admin']);
    Route::get('/search', [ContactUsController::class, 'search']);
    Route::post('/delete', [ContactUsController::class, 'destroy']);
    Route::post('/export', [ContactUsController::class, 'export']);
});